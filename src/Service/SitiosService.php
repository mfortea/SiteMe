<?php

namespace App\Service;
use App\API\IApiSitios;

class SitiosService {

    private $apiSitios;

    public function SitiosService() {
        $this->apiSitios = null;
    }

    public function setApiSitios ( IApiSitios $apiSitios ) {
        $this->apiSitios = $apiSitios;
    }

    public function getSitios ( string $latitud, string $longitud, string $busqueda, string $radio ) {
        return $this->apiSitios->getSitios( $latitud, $longitud, $busqueda, $radio );
    }

}
