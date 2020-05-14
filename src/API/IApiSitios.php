<?php
namespace App\API;

interface IApiSitios
{
    public function getSitios(string $latitud, string $longitud, string $busqueda, string $radio);
}
