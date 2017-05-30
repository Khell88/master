<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
                'placeholder' => null
            ))
            ->add('bolsaid', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Bolsa',
                'choice_label' => 'codigo',
                'label' => 'Unidades a Utilizar',
                'expanded' => true,
                'multiple' => true,

            ))
            ->add('pcTipoSangre', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,
                'placeholder' => null,
                'label' => 'Prueba Cruzada de tipo de sangre'
            ))
            ->add('pcRh', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'),
                'expanded' => true,
                'placeholder' => null,
                'label' => 'Prueba Cruzada de factor'
            ))
            ->add('pbAntesTemp', TextType::class, array(
                'label' => 'Temperatura', 'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbAntesTa', TextType::class, array(
                'label' => 'Tensión arterial',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbAntesFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDurTemp', TextType::class, array(
                'label' => 'Temperatura',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDurTa', TextType::class, array(
                'label' => 'Tensión arterial',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDurFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDesTemp', TextType::class, array(
                'label' => 'Temperatura',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDesTa', TextType::class, array(
                'label' => 'Tensión arterial',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('pbDesFc', TextType::class, array(
                'label' => 'Frecuencia cardiaca',
                'attr' => array(
                    'class' => 'text-box-size'
                ),
                'label_attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('causaNoPruebas', TextareaType::class, array(
                'label' => 'En caso de no hacer las pruebas reflejar causa',
                'label_attr'=>array(
                    'class'=>'texto'
                ),
                'attr' => array(
                    'class' => 'text-area'
                )
            ))
            ->add('fechaTransfusion', DateType::class, array(
                'widget' => 'single_text'
            ))
            ->add('horaTransfusion', TimeType::class, array(
                'widget' => 'single_text'
            ))
            ->add('fechaRecepcion', DateType::class, array(
                    'widget' => 'single_text'
                )
            )->add('horaRecepcion', TimeType::class, array(
                'widget' => 'single_text'
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
            'data_class' => 'Krytek\DataBundle\Entity\RecepcionSolicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_recepcionsolicitud';
    }


}
