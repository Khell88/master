<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ciPaciente', TextType::class, array(
                'label' => false,
                'attr' => array(
                    'class' => 'only_number paciente_ci',
                    'minlength' => '11',
                    'maxlength' => '11',
                    'title' => 'El carnet debe tener 11 dígitos',

                )
            ))
            ->add('nombre', TextType::class, array(
                'attr' => array(
                    'class' => 'only_letter'
                ),
                'label' => false
            ))
            ->add('apellidos', TextType::class, array(
                'attr' => array(
                    'class' => 'only_letter'
                ),
                'label' => false
            ))->add('edad', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number edad',
                    'maxlength' => '3',
                    'minlength' => '1',

                ),
                'label' => false
            ))
            ->add('sexo', ChoiceType::class, array(
                'choices' => array('Masculino' => 'M', 'Femenino' => 'F'),
                'expanded' => true,
                'label' => false
            ))
            ->add('idHc', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number num_hc',
                    'maxlength' => '6',
                    'minlength' => '3',

                ),
                'label' => false
            ))
            ->add('peso', TextType::class, array(
                'attr' => array(
                    'class' => 'weight',
                    'name' => 'peso',
                    'maxlength' => '6',
                ),
                'label' => false
            ))
            ->add('lactante', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,
                'attr' => array(
                    'class' => 'lactante',

                ),
                'placeholder' => null,
                'label' => false,
                'choice_attr'=>array(
                    'class'=>'lact_choice'
                )


            ))
            ->add('embarazos', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,
                'attr' => array(
                    'class' => 'embarazos'
                ),
                'placeholder' => null,
                'required' => false,
                'label' => false
            ))
            ->add('abortos', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,
                'attr' => array(
                    'class' => 'abortos'
                ),
                'placeholder' => null,
                'required' => false,
                'label' => false

            ))
            ->add('tipoSangre', ChoiceType::class, array(
                'choices' => array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'),
                'expanded' => true,
                'label' => false
            ))
            ->add('rh', ChoiceType::class, array(
                'choices' => array('Positivo' => 'positivo', 'Negativo' => 'negativo'),
                'expanded' => true,
                'label' => false
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'id' => 'paciente'
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'paciente';
    }


}
