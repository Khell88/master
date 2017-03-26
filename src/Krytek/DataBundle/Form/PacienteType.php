<?php

namespace Krytek\DataBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ciPaciente'
            )->add('nombre')
            ->add('apellidos')
            ->add('sexo')
            ->add('tipoSangre')
            ->add('idHc')
            ->add('peso')
            ->add('lactante')
            ->add('embarazos')
            ->add('rh')
            ->add('abortos')
            ->add('reporteReaccionid',HiddenType::class)
            ->add('diagnosticosid',EntityType::class,array(
                'class'=>'Krytek\DataBundle\Entity\Diagnosticos',
                'choice_label'=>'descripcion',
                'label'=>'Diagnostico',
                'expanded'=>true
            ));
    }

    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_paciente';
    }


}
