<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotivoTransfusionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TextareaType::class)
            ->add('componente', ChoiceType::class, array(
                'label' => 'Componente asociado',
                'choices' => array(
                    'Sangre Total' => 'Sangre Total',
                    'Concentrado de eritrocitos' => 'Concentrado de eritrocitos',
                    'Plasma fresco congelado' => 'Plasma fresco congelado',
                    'Crioprecipitado' => 'Crioprecipitado',
                    'Concentrado de plaquetas' => 'Concentrado de plaquetas',
                ),
                'placeholder' => '---Seleccione---',
                'attr'=>array(
                    'class'=>'krytek_databundle_componente'
                )
            ))
            ->add('Diagnoticos', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Diagnosticos',
                'choice_label' => 'descripcion',
                'label' => 'Diagnosticos',
                'expanded' => false,
                'mapped' => false,
                'placeholder'=>'---Seleccione---',
                'attr' => array(
                    'class' => 'krytek_databundle_diagnosticos'
                )
            ))
            ->add('Motivos', ChoiceType::class, array(
                'mapped' => false,
                'label'=>'Motivos',
                'expanded'=>true,
                'attr' => array(
                    'class' => 'krytek_databundle_motivo'
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\MotivoTransfusion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_motivotransfusion';
    }


}
