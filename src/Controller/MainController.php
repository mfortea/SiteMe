<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;
use App\Service\SitiosService;
use App\API\GMapsApiSitios;
use App\API\MockApiSitios;
use App\Entity\Usuario;
use App\Entity\Favorito;
use \stdClass;

class MainController extends AbstractController {

    public function index() {
        return $this->render( 'index.html.twig' );
    }

    public function busqueda() {
        return $this->render( 'busqueda.html.twig' );
    }

    public function buscarLugares( LoggerInterface $logger, Request $request, SitiosService $sitiosService ) {

        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $latitud = $json->lat;
        $longitud = $json->lng;
        $busqueda = $json->busqueda;
        $radio =  $json->radio;

        $apiSitios = new MockApiSitios();
        $sitiosService->setApiSitios( $apiSitios );

        return new JsonResponse( $sitiosService->getSitios( $latitud, $longitud, $busqueda, $radio ) );
    }

    public function nuevoFavorito ( Request $request ) {

        $json_raw = $request->getContent();
        $json = json_decode($json_raw);

        $id_sitio = $json->id;
        $nombre = $json->nombre;
        $latitud = $json->latitud;
        $longitud = $json->longitud;
        $icono = $json->icono;
        $direccion =  $json->direccion;

        $entityManager = $this->getDoctrine()->getManager();
        $favorito = new Favorito();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();

        /*
        foreach ($usuario->getFavoritos() as $sitio) {
            if ($sitio->getNombre() == $nombre) {
                return new JsonResponse([
                    'error' => 'El sitio ya está en tus favoritos'
                    ], 409);
            }
        }
        */

        $favorito->setUsuario($usuario);
        $favorito->setIdSitio($id_sitio);
        $favorito->setNombre($nombre);
        $favorito->setLatitud($latitud);
        $favorito->setLongitud($longitud);
        $favorito->setIcono($icono);
        $favorito->setDireccion($direccion);

        $entityManager->persist($favorito);
        $entityManager->flush();

        return new JsonResponse(200);
    }

    public function obtenerFavoritos(){
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.token_storage')->getToken()->getUser();
        $favoritos = $entityManager->getRepository(Favorito::class)->findByUsuario($usuario);

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

    public function sitios() {
        return $this->render( 'sitios.html.twig' );
    }

}
