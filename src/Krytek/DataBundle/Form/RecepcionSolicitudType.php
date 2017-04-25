<?php

namespace Krytek\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecepcionSolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('muestra')
            ->add('hcBolsa')
            ->add('pcTipoSangre')
            ->add('pcRh')
            ->add('pbAntesTemp')
            ->add('pbAntesTa')
            ->add('pbAntesFc')
            ->add('pbDurTemp')
            ->add('pbDurTa')
            ->add('pbDurFc')
            ->add('pbDesTemp')
            ->add('pbDesTa')
            ->add('pbDesFc')
            ->add('causaNoPruebas')
            ->add('fechaTransfusion')
            ->add('horaTransfusion')
            ->add('fechaRecepcion'
            )->add('horaRecepcion')
            ->add('reaccionTransfusional')
            ->add('muestraReaccion')
            ->add('pruebaPostransfusional')
            ->add('notificacion')
            ->add('cultivoPostransfusional')
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Krytek\DataBundle\Entity\RecepcionSolicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'krytek_databundle_recepcionsolicitud';
    }


}
