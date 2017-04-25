<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitudTransfusionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('Datos', PacienteType::class, array(
                'mapped' => false,
                'label' => 'Datos Paciente:'
            ))
            ->add('ComponenteATransfundir', ChoiceType::class, array(
                'choices' => array(
                    'Sangre Total' => 'Sangre Total',
                    'Concentrado de eritrocitos' => 'Concentrado de eritrocitos',
                    'Plasma fresco congelado' => 'Plasma fresco congelado',
                    'Crioprecipitado' => 'Crioprecipitado',
                    'Concentrado de plaquetas' => 'Concentrado de plaquetas',
                ),
                'mapped' => false,
                'expanded' => false,
                'placeholder' => '---Seleccione---',
                'attr' => array(
                    'class' => 'krytek_databundle_componente'
                )
            ))
            ->add('Diagnoticos', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Diagnosticos',
                'choice_label' => 'descripcion',
                'label' => 'Diagnosticos',
                'expanded' => false,
                'mapped' => false,
                'placeholder' => '---Seleccione---',
                'attr' => array(
                    'class' => 'krytek_databundle_diagnosticos'
                )
            ))
            ->add('Motivos', ChoiceType::class, array(
                'label' => 'Motivo de Transfusión',
                'expanded' => true,
                'mapped' => false,
                'attr' => array(
                    'class' => 'krytek_databundle_motivo'
                )

            ))
            ->add('tipoCirugia', TextType::class, array('label' => 'Tipo de Cirugía'))
            ->add('fecha')
            ->add('hora')
            ->add('sala')
            ->add('cama')
            ->add('urgencia', ChoiceType::class, array(
                'choices' => array('Reserva' => 'Reserva', 'Urgente' => 'Urgente',
                    'En el día' => 'En el día', 'Emergente' => 'Emergente'),
                'expanded' => true,
                'label' => 'Grado de Urgencia'
            ))
            ->add('hb')
            ->add('tp')
            ->add('tptk')
            ->add('plaquetas')
            ->add('objetivo')
            ->add('consentimiento', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'), 'expanded' => true,
                'choice_attr' => array(''),
            ))
            ->add('incompatibilidadMF', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'label' => 'Incompatibilidad materno fetal',
                'expanded' => true
            ))
            ->add('fechaARealizar', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('horaARealizar', TimeType::class, array(
                'widget' => 'single_text'
            ))
            ->add('serviciosid', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Servicios',
                'choice_label' => 'descripcion',
                'label' => 'Servicio'
            ))
            ->add('usuarioid', HiddenType::class);

    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_solicitudtransfusion';
    }


}
