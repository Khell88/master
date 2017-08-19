<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecepcionSolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('muestra', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,
                'placeholder' => null,

            ))
            ->add('pruebasLaboratorio', ChoiceType::class, array(
                'mapped'=>false,
                'label'=>'Pruebas realizada(s) a la(s) unidad(es)',
                'expanded'=>true,
                'attr'=>array(
                    'class'=>'pruebas_lab',

                )
            ))

            ->add('pbAntesTemp', TextType::class, array(
                'label' => 'Temperatura',

            ))
            ->add('pbAntesTa', TextType::class, array(
                'label' => 'Tensión arterial',


            ))
            ->add('pbAntesFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',


            ))
            ->add('pbDurTemp', TextType::class, array(
                'label' => 'Temperatura',


            ))
            ->add('pbDurTa', TextType::class, array(
                'label' => 'Tensión arterial',


            ))
            ->add('pbDurFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',


            ))
            ->add('pbDesTemp', TextType::class, array(
                'label' => 'Temperatura',


            ))
            ->add('pbDesTa', TextType::class, array(
                'label' => 'Tensión arterial',


            ))
            ->add('pbDesFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',


            ))
            ->add('causaNoPruebas', TextareaType::class, array(
                'label' => 'En caso de no hacer las pruebas reflejar causa',
                'attr' => array(
                    'class' => 'text-area',
                ),
                'required'=>false,

            ))
            ->add('fechaTransfusion', DateType::class, array(
                'attr' => array(
                    'class' => 'date date_sec'
                ),
                'widget' => 'single_text',
                'html5' => false,
                'input' => 'datetime',
                'label' => false,
                'format' => 'MM/dd/yyyy',
            ))
            ->add('horaTransfusion', TimeType::class, array(
                'widget' => 'single_text',
                'attr' => array(
                    'class' => 'time time_sec'
                ),
                'label' => false,
            ))
            ->add('fechaRecepcion', DateType::class, array(
                    'attr' => array(
                        'class' => 'date date_prim'
                    ),
                    'widget' => 'single_text',
                    'html5' => false,
                    'input' => 'datetime',
                    'label' => false,
                    'format' => 'MM/dd/yyyy',
                )
            )->add('horaRecepcion', TimeType::class, array(
                'widget' => 'single_text',

                'attr' => array(
                    'class' => 'time time_prim'
                ),
                'label' => false,
            ))
            ->add('reaccionTransfusional', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,

                'placeholder' => null
            ))
            ->add('muestraReaccion', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,

                'placeholder' => null,
                'label' => 'Toma de muestra de reacción'
            ))
            ->add('pruebaPostransfusional', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,

                'placeholder' => null
            ))
            ->add('notificacion', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,

                'placeholder' => null
            ))
            ->add('cultivoPostransfusional', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,

                'placeholder' => null
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\RecepcionSolicitud',
            'attr' => array(
                'id' => 'recepcion'
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'recepcionsolicitud';
    }


}
