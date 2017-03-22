<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PacienteMotivoSolicitud
 *
 * @ORM\Table(name="paciente_motivo_solicitud", indexes={@ORM\Index(name="IDX_D4F78A3D41CBBEA5", columns={"motivo_transfusionid"}), @ORM\Index(name="IDX_D4F78A3D884F88C5", columns={"solicitud_transfusionid"}), @ORM\Index(name="IDX_D4F78A3D340BCA0D", columns={"pacienteid"})})
 * @ORM\Entity
 */
class PacienteMotivoSolicitud
{
    /**
     * @var \MotivoTrasnfusion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MotivoTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivo_transfusionid", referencedColumnName="id")
     * })
     */
    private $motivoTransfusionid;

    /**
     * @var \SolicitudTransfusion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="SolicitudTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="solicitud_transfusionid", referencedColumnName="id")
     * })
     */
    private $solicitudTransfusionid;

    /**
     * @var \Paciente
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Paciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pacienteid", referencedColumnName="id")
     * })
     */
    private $pacienteid;


}

