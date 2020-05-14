<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email', EmailType::class, array('label' => ' Email', "attr" => array("class" => "form-email form-control", "placeholder" => "Escribe tu email", "onkeyup" => "comprobarUsuario(this)")))
            ->add('clave', RepeatedType::class, array(
                "required" => "required",
                'type' => PasswordType::class,
                'invalid_message' => 'Las contraseñas no coinciden',
                'first_options' => array('label' => 'Contraseña', "attr" => array("class" => "form-password form-control", "placeholder" => "Escribe tu contraseña")),
                'second_options' => array('label' => 'Repita la contraseña', "attr" => array("class" => "form-password form-control", "placeholder" => "Repita la contraseña")),
            )
            )
            ->add('save', SubmitType::class,
                array('label' => 'Registrarse', "attr" => array("class" => "boton-login")))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Form\Model\Registro',
        ));
    }

    public function getName()
    {
        return 'change_passwd';
    }
}
