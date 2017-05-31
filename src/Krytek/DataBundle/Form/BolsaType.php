<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class BolsaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number'
                ),
                'label' => false
            ))
            ->add('componente', ChoiceType::class, array(
                'choices' => array('Sangre Total' => 'Sangre Total',
                    'Eritrocitos' => array(
                        'Concentrado de eritrocitos' => 'Concentrado de eritrocitos',
                        'Concentrado de eritrocitos lavados' => 'Concentrado de eritrocitos lavados',),
                    'Plasma' => array(
                        'Plasma fresco congelado' => 'Plasma fresco congelado',
                        'Crioprecipitado' => 'Crioprecipitado',),
                    'Plaquetas' => array(
                        'Concentrado de plaquetas' => 'Concentrado de plaquetas',
                    )),
                'placeholder' => '---Seleccione una opción---',
                'label' => false
            ))
            ->add('lote', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number'
                ),
                'label' => false
            ))
            ->add('fechaDonacion', DateType::class, array(
                'attr' => array(
                    'class' => 'date date_prim'
                ),
                'html5' => false,
                'widget' => 'single_text',
                'input' => 'datetime',
                'label' => false,
                'format'=>'MM/dd/yyyy',




            ))
            ->add('fechaVencimiento', DateType::class, array(
                'attr' => array(
                    'class' => 'date date_sec'
                ),
                'html5' => false,
                'widget' => 'single_text',
                'input' => 'datetime',
                'label' => false,
                'format'=>'MM/dd/yyyy',


            ))
            ->add('procedencia', TextType::class, array(
                'label' => false
            ))
            ->add('problemas', TextareaType::class, array(
                'label' => false,
                'attr' => array(
                    'class' => 'texto'
                )
            ))
            ->add('grupoSanguineo', ChoiceType::class, array(
                'choices' => array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'),
                'expanded' => true,
                'label' => false
            ))
            ->add('rh', ChoiceType::class, array(
                'choices' => array('Positivo' => 'positivo', 'Negativo' => 'negativo'),
                'expanded' => true,
                'label' => false
            ))
            ->add('muestra', ChoiceType::class, array(
                'label' => false,
                'choices' => array('SI' => 'SI', 'NO' => 'NO'),
                'expanded' => true,
            ))
            ->add('volumen', TextType::class, array(
                'attr' => array(
                    'class' => 'only_number'
                ),
                'label' => false
            ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'id' => 'bolsa'
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_bolsa';
    }


}
