<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CambiarEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nuevoEmail', EmailType::class, array('label' => ' Nuevo email', "attr" => array("class" => "form-email form-control", "placeholder" => "Escribe tu nuevo email", "onkeyup" => "comprobarUsuario(this)")))
            ->add('clave', PasswordType::class, array('label' => 'Contraseña actual', "attr" => array("class" => "form-password form-control", "placeholder" => "Escribe tu contraseña actual")))
            ->add('save', SubmitType::class,
                array('label' => 'Cambiar email', "attr" => array("class" => "boton-login")))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Form\Model\CambiarEmail',
        ));
    }

    public function getName()
    {
        return 'change_passwd';
    }
}
