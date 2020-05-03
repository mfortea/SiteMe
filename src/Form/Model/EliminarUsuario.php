<?php
namespace App\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class EliminarUsuario {

/**
 * @SecurityAssert\UserPassword(
 *     message = "La contraseña no es correcta"
 * )
 */
protected $clave;


public function getClave() {
    return $this->clave;
}

public function setClave($clave) {
    $this->clave = $clave;
    return $this;
}


}