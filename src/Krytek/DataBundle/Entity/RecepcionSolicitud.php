<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecepcionSolicitud
 *
 * @ORM\Table(name="recepcion_solicitud", indexes={@ORM\Index(name="IDX_A902C000884F88C5", columns={"solicitud_transfusionid"}), @ORM\Index(name="IDX_A902C00088EF46FF", columns={"usuarioid"})})
 * @ORM\Entity
 */
class RecepcionSolicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="recepcion_solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra", type="string", length=1, nullable=false)
     */
    private $muestra;

    /**
     * @var integer
     *
     * @ORM\Column(name="hc_bolsa", type="integer", nullable=false)
     */
    private $hcBolsa;

    /**
     * @var string
     *
     * @ORM\Column(name="pc_tipo_sangre", type="string", length=255, nullable=true)
     */
    private $pcTipoSangre;

    /**
     * @var string
     *
     * @ORM\Column(name="pc_rh", type="string", length=255, nullable=true)
     */
    private $pcRh;

    /**
     * @var integer
     *
     * @ORM\Column(name="pb_antes_temp", type="integer", nullable=true)
     */
    private $pbAntesTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_antes_ta", type="string", length=255, nullable=true)
     */
    private $pbAntesTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_antes_fc", type="string", length=255, nullable=true)
     */
    private $pbAntesFc;

    /**
     * @var integer
     *
     * @ORM\Column(name="pb_dur_temp", type="integer", nullable=true)
     */
    private $pbDurTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_dur_ta", type="string", length=255, nullable=true)
     */
    private $pbDurTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_dur_fc", type="string", length=255, nullable=true)
     */
    private $pbDurFc;

    /**
     * @var integer
     *
     * @ORM\Column(name="pb_des_temp", type="integer", nullable=true)
     */
    private $pbDesTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_des_ta", type="string", length=255, nullable=true)
     */
    private $pbDesTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_des_fc", type="string", length=255, nullable=true)
     */
    private $pbDesFc;

    /**
     * @var string
     *
     * @ORM\Column(name="causa_no_pruebas", type="string", length=255, nullable=true)
     */
    private $causaNoPruebas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_transfusion", type="date", nullable=false)
     */
    private $fechaTransfusion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_transfusion", type="time", nullable=false)
     */
    private $horaTransfusion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recepcion", type="date", nullable=false)
     */
    private $fechaRecepcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_recepcion", type="time", nullable=false)
     */
    private $horaRecepcion;

    /**
     * @var string
     *
     * @ORM\Column(name="reaccion_transfusional", type="string", length=1, nullable=false)
     */
    private $reaccionTransfusional;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra_reaccion", type="string", length=1, nullable=false)
     */
    private $muestraReaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="prueba_postransfusional", type="string", length=1, nullable=false)
     */
    private $pruebaPostransfusional;

    /**
     * @var string
     *
     * @ORM\Column(name="notificacion", type="string", length=1, nullable=false)
     */
    private $notificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cultivo_postransfusional", type="string", length=1, nullable=false)
     */
    private $cultivoPostransfusional;

    /**
     * @var \SolicitudTransfusion
     *
     * @ORM\ManyToOne(targetEntity="SolicitudTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="solicitud_transfusionid", referencedColumnName="id")
     * })
     */
    private $solicitudTransfusionid;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     * })
     */
    private $usuarioid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Bolsa", mappedBy="recepcionSolicitudid")
     */
    private $bolsaid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bolsaid = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

