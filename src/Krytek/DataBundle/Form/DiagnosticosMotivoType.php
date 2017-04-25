<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/23/2017
 * Time: 20:05
 */

namespace Krytek\DataBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class DiagnosticosMotivoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Diagnosticos', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\Diagnosticos',
                'choice_label' => 'descripcion',
                'label' => 'Diagnosticos',
                'expanded' => false,
                'mapped' => false,
                'placeholder' => '---Seleccione---',
            ))
            ->add('Motivos', EntityType::class, array(
                'class' => 'Krytek\DataBundle\Entity\MotivoTransfusion',
                'choice_label' => 'descripcion',
                'label' => 'Motivos',
                'expanded' => false,
                'mapped' => false,
                'placeholder' => '---Seleccione---',
            ));
    }

}