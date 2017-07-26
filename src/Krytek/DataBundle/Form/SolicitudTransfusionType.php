<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('pcnt', PacienteType::class, array(
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
                ),
                'label' => false
            ))
            ->add('Diagnosticos', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Diagnosticos',
                'choice_label' => 'descripcion',
                'label' => 'Diagnosticos',
                'expanded' => false,
                'mapped' => false,
                'placeholder' => '---Seleccione---',
                'attr' => array(
                    'class' => 'krytek_databundle_diagnosticos'
                ),
                'required' => false,
                'label' => false
            ))
            ->add('Motivos', ChoiceType::class, array(
                'label' => 'Motivo de Transfusión',
                'expanded' => true,
                'mapped' => false,
                'attr' => array(
                    'class' => 'krytek_databundle_motivo'
                ),
                'label' => false

            ))
            ->add('tipoCirugia', TextType::class, array(
                'label' => 'Tipo de Cirugía',
                'attr' => array(
                    'class' => 'only_letter'
                ),
                'required' => false,
                'label' => false
            ))
            ->add('fecha', DateType::class, array(
                'attr'=>array(
                    'class'=>'date date_prim'
                ),
                'widget'=>'single_text',
                'html5'=>false,
                'input'=>'datetime',
                'label'=>false,
                'format'=>'MM/dd/yyyy',
            ))
            ->add('hora', TimeType::class, array(
                'widget' => 'choice',

                'attr' => array(
                    'class' => 'time time_prim'
                ),
                'label' => false,

            ))
            ->add('sala', TextType::class, array(
                'attr' => array(
                    'class' => 'only_letter',
                    'maxlength' => '2'
                ),
                'label' => false
            ))
            ->add('cama', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number',
                    'maxlength' => 2,
                ),
                'label' => false
            ))
            ->add('urgencia', ChoiceType::class, array(
                'choices' => array('Reserva' => 'Reserva', 'Urgente' => 'Urgente',
                    'En el día' => 'En el día', 'Emergente' => 'Emergente'),
                'expanded' => true,
                'label' => false
            ))
            ->add('hb', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number',
                    'maxlength' => 6,
                ),
                'label' => false
            ))
            ->add('tp', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number',
                    'maxlength' => 6,
                ),
                'label' => false
            ))
            ->add('tptk', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number',
                    'maxlength' => 6,
                ),
                'label' => false
            ))
            ->add('plaquetas', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number',
                    'maxlength' => 6,
                ),
                'label' => false
            ))
            ->add('objetivo', ChoiceType::class, array(
                'choices' => array(
                    'Reemplazar volumen en sangre' => 'Reemplazar volumen en sangre',
                    'Mejorar Oxigenación' => 'Mejorar Oxigenación',
                    'Fomentar coagulación' => 'Fomentar coagulación',
                    'Tratamiento trombocitopenia' => 'Tratamiento trombocitopenia',
                ),
                'label' => false,
                'expanded' => true,
            ))
            ->add('consentimiento', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,
                'placeholder' => null,
                'label' => false

            ))
            ->add('incompatibilidadMF', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'label' => 'Incompatibilidad materno fetal',
                'expanded' => true,
                'attr' => array(
                    'class' => 'incompatible'
                ),
                'required' => false,
                'placeholder' => null,
                'label' => false

            ))
            ->add('fechaARealizar', DateType::class, array(
                'attr'=>array(
                    'class'=>'date date_sec'
                ),
                'widget'=>'single_text',
                'html5'=>false,
                'input'=>'datetime',
                'label'=>false,
                'format'=>'MM/dd/yyyy',

            ))
            ->add('horaARealizar', TimeType::class, array(
                'widget' => 'choice',
                'attr' => array(
                    'class' => 'time time_sec'
                ),
                'label' => false,

            ))
            ->add('serviciosid', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Servicios',
                'choice_label' => 'descripcion',
                'placeholder' => '---Seleccione---',
                'label' => false
            ));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'id' => 'solicitud'
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'solicitud';
    }


}
