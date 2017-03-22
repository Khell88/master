<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BolsaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codigo')->add('componente')->add('lote')->add('fechaDonacion')->add('fechaVencimiento')->add('procedencia')->add('problemas')->add('grupoSanguineo')->add('rh')->add('muestra')->add('volumen')->add('pruebasLaboratorioid')->add('recepcionSolicitudid')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\Bolsa'
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
