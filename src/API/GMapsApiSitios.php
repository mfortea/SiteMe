<?php

namespace App\API;
use joshtronic;
use \stdClass;
use Symfony\Component\Dotenv\Dotenv;

class GMapsApiSitios implements IApiSitios {

    public function getSitios ( string $latitud, string $longitud, string $busqueda, string $radio ) {

        $dotenv = new Dotenv();
        $dotenv->load( '../.env' );
        $API_KEY = $_ENV['API_KEY'];

        $google_places = new joshtronic\GooglePlaces( $API_KEY );
        $google_places->location = array( $latitud, $longitud );
        $google_places->radius   = $radio;
        $google_places->keyword  = $busqueda;
        $results                 = $google_places->nearbysearch();

        $arrayResultados = $results['results'];

        $resultado = new stdClass();

        $numSitios = count( $arrayResultados );

        for ( $i = 0; $i<$numSitios; $i++ ) {

            $sitio = $arrayResultados;

            $id = $i;
            $latitud = $sitio[$i]['geometry']['location']['lat'];
            $longitud = $sitio[$i]['geometry']['location']['lng'];
            $nombre = $sitio[$i]['name'];
            $icono = $sitio[$i]['icon'];
            $direccion = $sitio[$i]['vicinity'];

            $objeto = new stdClass();
            $objeto->id = $id;
            $objeto->latitud = $latitud;
            $objeto->longitud = $longitud;
            $objeto->nombre = $nombre;
            $objeto->icono = $icono;
            $objeto->direccion = $direccion;

            $resultado->sitios[$i] = $objeto;
        }

        return $resultado;

    }
}