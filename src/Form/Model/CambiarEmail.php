<?php
namespace App\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class CambiarEmail {

/**
 * @SecurityAssert\UserPassword(
 *     message = "La contraseña actual no es correcta"
 * )
 */
protected $clave;


protected $nuevoEmail;


public function getClave() {
    return $this->clave;
}

public function setClave($clave) {
    $this->clave = $clave;
    return $this;
}


public function getNuevoEmail() {
    return $this->nuevoEmail;
}

public function setNuevoEmail($nuevoEmail) {
    $this->nuevoEmail = $nuevoEmail;
    return $this;
}

}