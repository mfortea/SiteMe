<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    public function buscarLugares( Request $request, SitiosService $sitiosService ) {

        $latitud =  $request->request->get( 'lat' );
        $longitud = $request->request->get( 'lng' );
        $busqueda = $request->request->get( 'busqueda' );
        $radio = $request->request->get( 'radio' );

        $apiSitios = new MockApiSitios();
        $sitiosService->setApiSitios( $apiSitios );

        return new JsonResponse( $sitiosService->getSitios( $latitud, $longitud, $busqueda, $radio ) );
    }

    public function sitios() {
        return $this->render( 'sitios.html.twig' );
    }

}
