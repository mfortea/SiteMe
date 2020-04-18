<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;
use App\Service\SitiosService;
use App\API\GMapsApiSitios;
use App\API\MockApiSitios;

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

        return new JsonResponse(200);

    }

    public function sitios() {
        return $this->render( 'sitios.html.twig' );
    }

}
