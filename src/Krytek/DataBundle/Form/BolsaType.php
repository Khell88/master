<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('codigo')
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
            ))
            ->add('lote')
            ->add('fechaDonacion', DateType::class, array(
                'widget' => 'single_text',

            ))
            ->add('fechaVencimiento', DateType::class, array(
                'widget' => 'single_text',


            ))
            ->add('procedencia')
            ->add('problemas')
            ->add('grupoSanguineo')
            ->add('rh', ChoiceType::class, array(
                'choices' => array('Positivo' => 'positivo', 'Negativo' => 'negativo'),
                'expanded' => true
            ))
            ->add('muestra')
            ->add('volumen');
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_bolsa';
    }


}
