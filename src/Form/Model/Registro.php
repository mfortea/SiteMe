<?php
namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Registro
{

    protected $email;

/**
 * @Assert\Length(
 *     min = 6,
 *     minMessage = "La contraseña tiene que tener al menos 6 caracteres"
 * )
 */
    protected $clave;

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

}
