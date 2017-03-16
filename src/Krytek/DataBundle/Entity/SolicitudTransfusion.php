<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudTransfusion
 *
 * @ORM\Table(name="solicitud_transfusion", indexes={@ORM\Index(name="IDX_50FA1E8409D1C63", columns={"serviciosid"}), @ORM\Index(name="IDX_50FA1E864FDF06E", columns={"medicoid"})})
 * @ORM\Entity
 */
class SolicitudTransfusion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="solicitud_transfusion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="sala", type="string", length=3, nullable=false)
     */
    private $sala;

    /**
     * @var integer
     *
     * @ORM\Column(name="cama", type="integer", nullable=false)
     */
    private $cama;

    /**
     * @var integer
     *
     * @ORM\Column(name="urgencia", type="integer", nullable=false)
     */
    private $urgencia;

    /**
     * @var float
     *
     * @ORM\Column(name="hb", type="float", precision=10, scale=0, nullable=false)
     */
    private $hb;

    /**
     * @var float
     *
     * @ORM\Column(name="tp", type="float", precision=10, scale=0, nullable=false)
     */
    private $tp;

    /**
     * @var float
     *
     * @ORM\Column(name="tptk", type="float", precision=10, scale=0, nullable=false)
     */
    private $tptk;

    /**
     * @var float
     *
     * @ORM\Column(name="plaquetas", type="float", precision=10, scale=0, nullable=false)
     */
    private $plaquetas;

    /**
     * @var string
     *
     * @ORM\Column(name="consentimiento", type="string", length=1, nullable=false)
     */
    private $consentimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="incompatibilidad_m_f", type="string", length=255, nullable=true)
     */
    private $incompatibilidadMF;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_a_realizar", type="date", nullable=false)
     */
    private $fechaARealizar;

    /**
     * @var integer
     *
     * @ORM\Column(name="hora_a_realizar", type="integer", nullable=false)
     */
    private $horaARealizar;

    /**
     * @var \Servicios
     *
     * @ORM\ManyToOne(targetEntity="Servicios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serviciosid", referencedColumnName="id")
     * })
     */
    private $serviciosid;

    /**
     * @var \Medico
     *
     * @ORM\ManyToOne(targetEntity="Medico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medicoid", referencedColumnName="id")
     * })
     */
    private $medicoid;


}

