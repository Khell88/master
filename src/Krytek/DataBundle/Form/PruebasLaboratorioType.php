<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PruebasLaboratorioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TextType::class, array(
                'label'=>false
            ))
            ->add('componente', ChoiceType::class, array(
                'choices' => array(
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
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array(
                'id' => 'pruebasLaboratorio'
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_pruebaslaboratorio';
    }


}
