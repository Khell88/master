<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 3/16/2017
 * Time: 12:40
 */

namespace Krytek\DataBundle\Form;


use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre', TextType::class)
            ->add('Apellidos', TextType::class)
            ->add('Carnet Identidad/No. Registro Profesional', TextType::BIGINT)
            ->add('password', RepeatedType::class, array(
                'type'=> PasswordType::class,
                'first_options' => array('label'=>'Contraseña'),
                'second_options' => array('label'=>'Repetir Contraseña'),
            ))
            ->add('rol', ChoiceType::class, array(
                'choices'=>array(
                    'Transfsionista' => 'ROLE_TRANSFUSIONISTA',
                    'Medico' => 'ROLE_MEDICO',
                ), 'empty_data'=> '--Selecciona--',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\Usuario'
        ));
    }
}