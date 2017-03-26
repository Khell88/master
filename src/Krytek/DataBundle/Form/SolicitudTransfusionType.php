<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Krytek\DataBundle\Entity\Usuario;
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
            ->add('Datos:', PacienteType::class)
            ->add('MotivoTransfusion',EntityType::class, array(
                'class'=>'Krytek\DataBundle\Entity\MotivoTransfusion',
                'choice_label'=>'descripcion',
                'label'=>'Motivo de Transfusión',
                'expanded'=>true
            ))
            ->add('tipoCirugia',TextType::class,array('label'=>'Tipo de Cirugía'))
            ->add('fecha')->add('hora')
            ->add('sala')->add('cama')
            ->add('urgencia')
            ->add('hb')
            ->add('tp')
            ->add('tptk')
            ->add('plaquetas')
            ->add('consentimiento', ChoiceType::class, array(
                'choices' => array('Si' => 'SI', 'No' => 'NO'), 'expanded' => true))
            ->add('incompatibilidadMF', ChoiceType::class, array(
                'choices'=>array('Si'=>'SI', 'No'=>'NO'),
                'label'=>'Incompatibilidad materno fetal'
            ))
            ->add('fechaARealizar', DateType::class,array(
                'widget'=>'single_text'
            ))
            ->add('horaARealizar', TimeType::class,array(
                'widget'=>'single_text'
            ))
            ->add('serviciosid',EntityType::class, array(
                'class'=>'Krytek\DataBundle\Entity\Servicios',
                'choice_label'=>'descripcion',
                'label'=>'Servicio'
            ))
            ->add('usuarioid',HiddenType::class);

    }

    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_solicitudtransfusion';
    }


}
