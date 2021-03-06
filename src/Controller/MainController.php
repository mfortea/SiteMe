<?php

namespace App\Controller;

use App\API\MockApiSitios;
use App\API\GMapsApiSitios;
use App\Entity\Favorito;
use App\Entity\Usuario;
use App\Form\CambiarClaveType;
use App\Form\CambiarEmailType;
use App\Form\EliminarUsuarioType;
use App\Form\Model\CambiarClave;
use App\Form\Model\CambiarEmail;
use App\Form\Model\EliminarUsuario;
use App\Form\Model\Registro;
use App\Form\RegistroType;
use App\Service\SitiosService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use \stdClass;
use Symfony\Component\Dotenv\Dotenv;

class MainController extends AbstractController
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function index()
    {
        return $this->render('index.html.twig');
    }

    public function registro(Request $request)
    {
        $session = $request->getSession();
        $modeloRegistro = new Registro();
        $form = $this->createForm(RegistroType::class, $modeloRegistro);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $encoder = $this->passwordEncoder;
                $password = $modeloRegistro->getClave();
                $email = $modeloRegistro->getEmail();
                $usuario = new Usuario();
                $buscarUsuario = $entityManager->getRepository(Usuario::class)->findOneByEmail($email);
                if ($buscarUsuario) {
                    $session->getFlashBag()->add('error', 'El email ya está registrado');
                } else {
                    $usuario->setEmail($email);
                    $usuario->setPassword($this->passwordEncoder->encodePassword(
                        $usuario, $password
                    ));
                    $usuario->setRoles(array('ROLE_USER'));
                    $entityManager->persist($usuario);
                    $flush = $entityManager->flush();
                    if ($flush === null) {
                        return $this->render('usuarioCreado.html.twig');
                    } else {
                        $session->getFlashBag()->add('warning', 'No se ha podido crear el usuario');
                    }
                }
            }
        }

        return $this->render('registro.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function comprobarUsuario(Request $request)
    {
        $json_raw = $request->getContent();
        $json = json_decode($json_raw);
        $email = $json->email;
        $entityManager = $this->getDoctrine()->getManager();
        $buscarUsuario = $entityManager->getRepository(Usuario::class)->findOneByEmail($email);
        if ($buscarUsuario) {
            return new JsonResponse([
                'error' => 'El email ya está registrado',
            ], 403);
        } else {
            return new JsonResponse(200);
        }

    }

    public function busqueda()
    {
        return $this->render('busqueda.html.twig');
    }

    public function sitios()
    {
        return $this->render('sitios.html.twig');
    }

    public function ajustes()
    {
        return $this->render('ajustes.html.twig');
    }

    public function buscarLugares(LoggerInterface $logger, Request $request, SitiosService $sitiosService)
    {
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $latitud = $json->lat;
        $longitud = $json->lng;
        $busqueda = $json->busqueda;
        $radio = $json->radio;

        $dotenv = new Dotenv();
        $dotenv->load('../.env');
        $TIPO_API = $_ENV['TIPO_API'];

        $apiSitios = null;

        if ($TIPO_API === "gmaps") {
            $apiSitios = new GMapsApiSitios();
        } elseif ($TIPO_API === "mock") {
            $apiSitios = new MockApiSitios();
        }

        $sitiosService->setApiSitios($apiSitios);
        $respuesta = $sitiosService->getSitios($latitud, $longitud, $busqueda, $radio);
        $numSitios = count($respuesta->sitios);

        $favoritos = $usuario->getFavoritos();

        foreach ($favoritos as $favorito) {
            for ($i = 0; $i < $numSitios; $i++) {
                if ($favorito->getIdSitio() == $respuesta->sitios[$i]->id) {
                    $respuesta->sitios[$i]->favorito = true;
                }
            }
        }
        return new JsonResponse($respuesta);
    }

    public function nuevoFavorito(Request $request)
    {

        $usuario = $this->get('security.token_storage')->getToken()->getUser();

        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $idSitio = $json->id;
        $nombre = $json->nombre;
        $latitud = $json->latitud;
        $longitud = $json->longitud;
        $icono = $json->icono;
        $direccion = $json->direccion;

        $entityManager = $this->getDoctrine()->getManager();

        $favorito = new Favorito();
        $favorito->setIdSitio($idSitio);
        $favorito->setNombre($nombre);
        $favorito->setLatitud($latitud);
        $favorito->setLongitud($longitud);
        $favorito->setIcono($icono);
        $favorito->setDireccion($direccion);

        $favoritoBD = $entityManager->getRepository(Favorito::class)->findOneByIdSitio($idSitio);

        if (!$favorito == $favoritoBD) {
            $favorito->addUsuario($usuario);
            $entityManager->persist($favorito);
            $entityManager->flush();
            return new JsonResponse(200);

        } else {

            $usuarios = $favoritoBD->getUsuarios();

            foreach ($usuarios as $usuarioBD) {
                if ($usuarioBD == $usuario) {
                    return new JsonResponse([
                        'error' => 'El sitio ya está en tus favoritos',
                    ], 409);
                }
            }

            $favoritoBD->addUsuario($usuario);
            $entityManager->persist($favoritoBD);
            $entityManager->flush();
            return new JsonResponse(200);
        }

    }

    public function obtenerFavoritos()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        $respuesta = new stdClass();
        $numSitios = count($favoritos);

        if ($numSitios < 1) {
            return new JsonResponse(null, 204);

        } else {

            for ($i = 0; $i < $numSitios; $i++) {

                $sitio = $favoritos;

                $id = $favoritos[$i]->getIdSitio();
                $latitud = $favoritos[$i]->getLatitud();
                $longitud = $favoritos[$i]->getLongitud();
                $nombre = $favoritos[$i]->getNombre();
                $icono = $favoritos[$i]->getIcono();
                $direccion = $favoritos[$i]->getDireccion();

                $objeto = new stdClass();
                $objeto->id = $id;
                $objeto->latitud = $latitud;
                $objeto->longitud = $longitud;
                $objeto->nombre = $nombre;
                $objeto->icono = $icono;
                $objeto->direccion = $direccion;

                $respuesta->sitios[$i] = $objeto;
            }

            return new JsonResponse($respuesta, 200);

        }

    }

    public function eliminarFavorito($idSitio)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        foreach ($favoritos as $favorito) {
            if ($favorito->getIdSitio() == $idSitio) {
                $entityManager->remove($favorito);
                $entityManager->flush();
                return new JsonResponse(null, 204);
            }
        }

        return new JsonResponse([
            'error' => 'El id del sitio no existe',
        ], 404);

    }

    public function eliminarFavoritos()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        foreach ($favoritos as $favorito) {
            $entityManager->remove($favorito);
        }
        $entityManager->flush();
        return new JsonResponse(null, 204);
    }

    public function cambiarClave(Request $request)
    {
        $session = $request->getSession();
        $modeloCambiarClave = new CambiarClave();
        $form = $this->createForm(CambiarClaveType::class, $modeloCambiarClave);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $usuario = $this->getUser();
                $encoder = $this->passwordEncoder;
                $password = $encoder->encodePassword($usuario, $modeloCambiarClave->getClave());
                $usuario->setPassword($password);
                $entityManager->persist($usuario);
                $flush = $entityManager->flush();
                if ($flush === null) {
                    return $this->render('claveCambiada.html.twig');
                } else {
                    $session->getFlashBag()->add('warning', 'No se ha podido cambiar la contraseña');
                }
            }
        }

        return $this->render('cambiarClave.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function cambiarEmail(Request $request)
    {
        $session = $request->getSession();
        $modeloCambiarEmail = new CambiarEmail();
        $form = $this->createForm(CambiarEmailType::class, $modeloCambiarEmail);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $usuario = $this->getUser();
                $encoder = $this->passwordEncoder;
                $password = $encoder->encodePassword($usuario, $modeloCambiarEmail->getClave());
                $nuevoEmail = $modeloCambiarEmail->getNuevoEmail();
                $buscarUsuario = $entityManager->getRepository(Usuario::class)->findOneByEmail($nuevoEmail);
                if ($buscarUsuario) {
                    $session->getFlashBag()->add('error', 'El email ya existe');
                } else {
                    $usuario->setEmail($nuevoEmail);
                    $entityManager->persist($usuario);
                    $flush = $entityManager->flush();
                    if ($flush === null) {
                        return $this->render('emailCambiado.html.twig');
                    } else {
                        $session->getFlashBag()->add('warning', 'No se ha podido cambiar el email');
                    }
                }

            }
        }

        return $this->render('cambiarEmail.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function eliminarUsuario(Request $request)
    {
        $session = $request->getSession();
        $modeloEliminarUsuario = new EliminarUsuario();
        $form = $this->createForm(EliminarUsuarioType::class, $modeloEliminarUsuario);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $usuario = $this->get('security.token_storage')->getToken()->getUser();
                $encoder = $this->passwordEncoder;
                $password = $encoder->encodePassword($usuario, $modeloEliminarUsuario->getClave());
                $this->get('security.token_storage')->setToken(null);
                $entityManager->remove($usuario);
                $flush = $entityManager->flush();
                if ($flush === null) {
                    return $this->render('usuarioEliminado.html.twig');
                } else {
                    $session->getFlashBag()->add('warning', 'No se ha podido eliminar el usuario');
                }
            }
        }

        return $this->render('eliminarUsuario.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
