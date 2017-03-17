<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 3/16/2017
 * Time: 12:40
 */

namespace Krytek\DataBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario', TextType::class)
            ->add('nombre', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('no_identificacion', IntegerType::class, array(
                'label'=> 'Carnet Ident. / RegistroProfesional',

            ))
            ->add('password', RepeatedType::class, array(
                'type'=> PasswordType::class,
                'first_options' => array('label'=>'Contraseña'),
                'second_options' => array('label'=>'Repetir Contraseña'),

            ))
            ->add('rol', ChoiceType::class, array(
                'choices'=>array(
                    'Seleccione'=>empty(true),
                    'Transfusionista' => 'ROLE_TRANSFUSIONISTA',
                    'Médico' => 'ROLE_MEDICO',
                ),'expanded'=>false,
            ));
    }


}