<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioFixture extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $usuario = new Usuario();
        $usuario->setEmail('usuario@email.com');
        $usuario->setPassword($this->passwordEncoder->encodePassword(
            $usuario,
            'usuario'
        ));
        $usuario->setRoles(array('ROLE_USER'));
        $manager->persist($usuario);
        $manager->flush();
    }
}
