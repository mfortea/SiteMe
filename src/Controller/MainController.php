<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Psr\Log\LoggerInterface;
use App\Service\SitiosService;
use App\API\GMapsApiSitios;
use App\API\MockApiSitios;
use App\Entity\Usuario;
use App\Entity\Favorito;
use App\Form\Model\CambiarClave;
use App\Form\CambiarClaveType;
use App\Form\Model\CambiarEmail;
use App\Form\CambiarEmailType;
use App\Form\Model\EliminarUsuario;
use App\Form\EliminarUsuarioType;
use \stdClass;

class MainController extends AbstractController {

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function index() {
        return $this->render( 'index.html.twig' );
    }

    public function busqueda() {
        return $this->render( 'busqueda.html.twig' );
    }

    public function sitios() {
        return $this->render( 'sitios.html.twig' );
    }

    public function ajustes() {
        return $this->render( 'ajustes.html.twig' );
    }

    public function buscarLugares( LoggerInterface $logger, Request $request, SitiosService $sitiosService ) {
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $latitud = $json->lat;
        $longitud = $json->lng;
        $busqueda = $json->busqueda;
        $radio =  $json->radio;

        $apiSitios = new MockApiSitios();
        $sitiosService->setApiSitios( $apiSitios );

        $respuesta = $sitiosService->getSitios( $latitud, $longitud, $busqueda, $radio);
        $numSitios = count( $respuesta->sitios);

        $favoritos = $usuario->getFavoritos();

        foreach($favoritos as $favorito) {
            for ( $i = 0; $i < $numSitios; $i++ ) {
                if($favorito->getIdSitio() == $respuesta->sitios[$i]->id ) {
                    $respuesta->sitios[$i]->favorito = true;
                }
            }
        }
        return new JsonResponse($respuesta);
    }

    public function nuevoFavorito ( Request $request ) {

        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        
        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $idSitio = $json->id;
        $nombre = $json->nombre;
        $latitud = $json->latitud;
        $longitud = $json->longitud;
        $icono = $json->icono;
        $direccion =  $json->direccion;

        $entityManager = $this->getDoctrine()->getManager();

        $favorito = new Favorito();
        $favorito->setIdSitio($idSitio);
        $favorito->setNombre($nombre);
        $favorito->setLatitud($latitud);
        $favorito->setLongitud($longitud);
        $favorito->setIcono($icono);
        $favorito->setDireccion($direccion);

        $favoritoBD = $entityManager->getRepository(Favorito::class)->findOneByIdSitio($idSitio);

        if (!$favorito == $favoritoBD){
            $favorito->addUsuario($usuario);
            $entityManager->persist($favorito);
            $entityManager->flush();
            return new JsonResponse(200);

        } else {

            $usuarios = $favoritoBD->getUsuarios();

            foreach($usuarios as $usuarioBD) {
                if($usuarioBD == $usuario ) {
                    return new JsonResponse([
                        'error' => 'El sitio ya está en tus favoritos'
                        ], 409);
                }
            }

            $favoritoBD->addUsuario($usuario);
            $entityManager->persist($favoritoBD);
            $entityManager->flush();
            return new JsonResponse(200);
        }


    }

    public function obtenerFavoritos(){
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        $respuesta = new stdClass();
        $numSitios = count( $favoritos );

        for ( $i = 0; $i<$numSitios; $i++ ) {

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


    public function eliminarFavorito($idSitio) {
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        foreach($favoritos as $favorito) {
          if($favorito->getIdSitio() == $idSitio ) {
            $entityManager->remove($favorito);
            $entityManager->flush();
            return new JsonResponse(null, 204);
          }
        }

        return new JsonResponse([
            'error' => 'El id del sitio no existe'
            ], 404);

    }

    public function eliminarFavoritos(){
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $usuario->getFavoritos();

        foreach($favoritos as $favorito) {
              $entityManager->remove($favorito);
        }
        $entityManager->flush();
        return new JsonResponse(null, 204);
    }

    public function cambiarClave(Request $request) {
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


public function cambiarEmail(Request $request) {
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
            if($buscarUsuario){
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


public function eliminarUsuario(Request $request) {
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
