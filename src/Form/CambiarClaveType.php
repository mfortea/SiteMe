<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CambiarClaveType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{

    $builder
            ->add('claveAnterior', PasswordType::class, array('label' => 'Contraseña actual', "attr" => array("class" => "form-password form-control", "placeholder" => "Contraseña actual")))
            ->add('clave', RepeatedType::class, array(
                "required" => "required",
                'type' => PasswordType::class,
                'invalid_message' => 'Las contraseñas no coinciden',
                'first_options' => array('label' => 'Nueva contraseña', "attr" => array("class" => "form-password form-control", "placeholder" => "Nueva contraseña")),
                'second_options' => array('label' => 'Repita la nueva contraseña', "attr" => array("class" => "form-password form-control", "placeholder" => "Repita la nueva contraseña"))
                    )
            )
            ->add('save', SubmitType::class,
            array('label' => 'Cambiar contraseña', "attr" => array("class" => "boton-login")))
            ;
}

public function setDefaultOptions(OptionsResolverInterface $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => 'Acme\UserBundle\Form\Model\CambiarClave',
    ));
}

public function getName()
{
    return 'change_passwd';
}
}