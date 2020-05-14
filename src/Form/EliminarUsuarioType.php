<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EliminarUsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('clave', PasswordType::class, array('label' => 'Contraseña actual', "attr" => array("class" => "form-password form-control", "placeholder" => "Escribe tu contraseña")))

            ->add('save', SubmitType::class,
                array('label' => 'Eliminar cuenta', "attr" => array("class" => "btn-ajustes btn btn-lg btn-danger")))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\UserBundle\Form\Model\EliminarUsuario',
        ));
    }

    public function getName()
    {
        return 'eliminar_usuario';
    }
}
