<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('ciPaciente'
            )->add('nombre')
            ->add('apellidos')
            ->add('sexo', ChoiceType::class, array(
                'choices' => array('Masculino' => 'M', 'Femenino' => 'F'),
                'expanded' => true,
                'placeholder' => 'Seleccione'
            ))
            ->add('tipoSangre', ChoiceType::class, array(
                'choices' => array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'),
                'expanded' => true,
            ))
            ->add('idHc')
            ->add('peso')
            ->add('lactante', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,

            ))
            ->add('embarazos', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,

            ))
            ->add('abortos', ChoiceType::class, array(
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,
            ))
            ->add('rh', ChoiceType::class, array(
                'choices' => array('Positivo' => 'positivo', 'Negativo' => 'negativo'),
                'expanded' => true,
                'label'=>'Factor Rh'
            ));
    }

    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_paciente';
    }


}
