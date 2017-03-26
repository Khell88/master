<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiagnosticosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descripcion')       ;
    }
    
    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_diagnosticos';
    }


}
