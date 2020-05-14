<?php
namespace App\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class CambiarClave
{

/**
 * @SecurityAssert\UserPassword(
 *     message = "La contraseña actual no es correcta"
 * )
 */
    protected $claveAnterior;

/**
 * @Assert\Length(
 *     min = 6,
 *     minMessage = "La contraseña tiene que tener al menos 6 caracteres"
 * )
 */
    protected $clave;

    public function getClaveAnterior()
    {
        return $this->claveAnterior;
    }

    public function setClaveAnterior($claveAnterior)
    {
        $this->claveAnterior = $claveAnterior;
        return $this;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
        return $this;
    }

}
