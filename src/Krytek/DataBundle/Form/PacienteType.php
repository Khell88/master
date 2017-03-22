<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ciPaciente')->add('nombre')->add('apellidos')->add('sexo')->add('tipoSangre')->add('idHc')->add('peso')->add('lactante')->add('embarazos')->add('rh')->add('abortos')->add('reporteReaccionid')->add('diagnosticosid')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\Paciente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_paciente';
    }


}
