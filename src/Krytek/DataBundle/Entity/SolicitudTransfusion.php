<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudTransfusion
 *
 * @ORM\Table(name="solicitud_transfusion", indexes={@ORM\Index(name="IDX_50FA1E8409D1C63", columns={"serviciosid"}), @ORM\Index(name="IDX_50FA1E864FDF06E", columns={"usuarioid"})})
 * @ORM\Entity(repositoryClass="Krytek\DataBundle\Entity\SolicitudTransfusionRepository")
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
     * @ORM\Column(name="sala", type="string", length=255, nullable=false)
     */
    private $sala;

    /**
     * @var integer
     *
     * @ORM\Column(name="cama", type="integer", nullable=false)
     */
    private $cama;

    /**
     * @var string
     *
     * @ORM\Column(name="urgencia", type="string", nullable=false)
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
     * @ORM\Column(name="objetivo", type="string", length=255, nullable=false)
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="consentimiento", type="string", length=255, nullable=false)
     */
    private $consentimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_cirugia", type="string", length=255, nullable=true)
     */
    private $tipoCirugia;

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
     * @var \DateTime
     *
     * @ORM\Column(name="hora_a_realizar", type="time", nullable=false)
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
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     * })
     */
    private $usuarioid;

    /**
     * @var \Paciente
     *
     * @ORM\ManyToOne(targetEntity="Paciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pacienteid", referencedColumnName="id")
     * })
     */
    private $pacienteid;

    /**
     * @var \MotivoTransfusion
     *
     * @ORM\ManyToOne(targetEntity="MotivoTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivo_transfusionid", referencedColumnName="id")
     * })
     */
    private $motivoTransfusionid;

    /**
     * @var \Diagnosticos
     *
     * @ORM\ManyToOne(targetEntity="Diagnosticos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="diagnosticosid", referencedColumnName="id")
     * })
     */
    private $diagnosticosid;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_medico", type="string", length=255, nullable=true)
     */
    private $nombreMedico;

    /**
     * @var string
     *
     * @ORM\Column(name="registro_medico", type="string", length=255, nullable=true)
     */
    private $registroMedico;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return SolicitudTransfusion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return SolicitudTransfusion
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set sala
     *
     * @param string $sala
     *
     * @return SolicitudTransfusion
     */
    public function setSala($sala)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return string
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set cama
     *
     * @param integer $cama
     *
     * @return SolicitudTransfusion
     */
    public function setCama($cama)
    {
        $this->cama = $cama;

        return $this;
    }

    /**
     * Get cama
     *
     * @return integer
     */
    public function getCama()
    {
        return $this->cama;
    }

    /**
     * Set urgencia
     *
     * @param string $urgencia
     *
     * @return SolicitudTransfusion
     */
    public function setUrgencia($urgencia)
    {
        $this->urgencia = $urgencia;

        return $this;
    }

    /**
     * Get urgencia
     *
     * @return string
     */
    public function getUrgencia()
    {
        return $this->urgencia;
    }

    /**
     * Set hb
     *
     * @param float $hb
     *
     * @return SolicitudTransfusion
     */
    public function setHb($hb)
    {
        $this->hb = $hb;

        return $this;
    }

    /**
     * Get hb
     *
     * @return float
     */
    public function getHb()
    {
        return $this->hb;
    }

    /**
     * Set tp
     *
     * @param float $tp
     *
     * @return SolicitudTransfusion
     */
    public function setTp($tp)
    {
        $this->tp = $tp;

        return $this;
    }

    /**
     * Get tp
     *
     * @return float
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * Set tptk
     *
     * @param float $tptk
     *
     * @return SolicitudTransfusion
     */
    public function setTptk($tptk)
    {
        $this->tptk = $tptk;

        return $this;
    }

    /**
     * Get tptk
     *
     * @return float
     */
    public function getTptk()
    {
        return $this->tptk;
    }

    /**
     * Set plaquetas
     *
     * @param float $plaquetas
     *
     * @return SolicitudTransfusion
     */
    public function setPlaquetas($plaquetas)
    {
        $this->plaquetas = $plaquetas;

        return $this;
    }

    /**
     * Get plaquetas
     *
     * @return float
     */
    public function getPlaquetas()
    {
        return $this->plaquetas;
    }

    /**
     * Set consentimiento
     *
     * @param string $consentimiento
     *
     * @return SolicitudTransfusion
     */
    public function setConsentimiento($consentimiento)
    {
        $this->consentimiento = $consentimiento;

        return $this;
    }

    /**
     * Get consentimiento
     *
     * @return string
     */
    public function getConsentimiento()
    {
        return $this->consentimiento;
    }

    /**
     * Set incompatibilidadMF
     *
     * @param string $incompatibilidadMF
     *
     * @return SolicitudTransfusion
     */
    public function setIncompatibilidadMF($incompatibilidadMF)
    {
        $this->incompatibilidadMF = $incompatibilidadMF;

        return $this;
    }

    /**
     * Get incompatibilidadMF
     *
     * @return string
     */
    public function getIncompatibilidadMF()
    {
        return $this->incompatibilidadMF;
    }

    /**
     * Set fechaARealizar
     *
     * @param \DateTime $fechaARealizar
     *
     * @return SolicitudTransfusion
     */
    public function setFechaARealizar($fechaARealizar)
    {
        $this->fechaARealizar = $fechaARealizar;

        return $this;
    }

    /**
     * Get fechaARealizar
     *
     * @return \DateTime
     */
    public function getFechaARealizar()
    {
        return $this->fechaARealizar;
    }

    /**
     * Set horaARealizar
     *
     * @param \DateTime $horaARealizar
     *
     * @return SolicitudTransfusion
     */
    public function setHoraARealizar($horaARealizar)
    {
        $this->horaARealizar = $horaARealizar;

        return $this;
    }

    /**
     * Get horaARealizar
     *
     * @return \DateTime
     */
    public function getHoraARealizar()
    {
        return $this->horaARealizar;
    }

    /**
     * Set serviciosid
     *
     * @param \Krytek\DataBundle\Entity\Servicios $serviciosid
     *
     * @return SolicitudTransfusion
     */
    public function setServiciosid(\Krytek\DataBundle\Entity\Servicios $serviciosid = null)
    {
        $this->serviciosid = $serviciosid;

        return $this;
    }

    /**
     * Get serviciosid
     *
     * @return \Krytek\DataBundle\Entity\Servicios
     */
    public function getServiciosid()
    {
        return $this->serviciosid;
    }

    /**
     * Set usuarioid
     *
     * @param \Krytek\DataBundle\Entity\Usuario $usuarioid
     *
     * @return SolicitudTransfusion
     */
    public function setUsuarioid(\Krytek\DataBundle\Entity\Usuario $usuarioid = null)
    {
        $this->usuarioid = $usuarioid;

        return $this;
    }

    /**
     * Get usuarioid
     *
     * @return \Krytek\DataBundle\Entity\Usuario
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Set tipoCirugia
     *
     * @param string $tipoCirugia
     *
     * @return SolicitudTransfusion
     */
    public function setTipoCirugia($tipoCirugia)
    {
        $this->tipoCirugia = $tipoCirugia;

        return $this;
    }

    /**
     * Get tipoCirugia
     *
     * @return string
     */
    public function getTipoCirugia()
    {
        return $this->tipoCirugia;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return SolicitudTransfusion
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set pacienteid
     *
     * @param \Krytek\DataBundle\Entity\Paciente $pacienteid
     *
     * @return SolicitudTransfusion
     */
    public function setPacienteid(\Krytek\DataBundle\Entity\Paciente $pacienteid = null)
    {
        $this->pacienteid = $pacienteid;

        return $this;
    }

    /**
     * Get pacienteid
     *
     * @return \Krytek\DataBundle\Entity\Paciente
     */
    public function getPacienteid()
    {
        return $this->pacienteid;
    }

    /**
     * Set motivoTransfusionid
     *
     * @param \Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid
     *
     * @return SolicitudTransfusion
     */
    public function setMotivoTransfusionid(\Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid = null)
    {
        $this->motivoTransfusionid = $motivoTransfusionid;

        return $this;
    }

    /**
     * Get motivoTransfusionid
     *
     * @return \Krytek\DataBundle\Entity\MotivoTransfusion
     */
    public function getMotivoTransfusionid()
    {
        return $this->motivoTransfusionid;
    }

    /**
     * Set procesada
     *
     * @param string $estado
     *
     * @return SolicitudTransfusion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get procesada
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set diagnosticosid
     *
     * @param \Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid
     *
     * @return SolicitudTransfusion
     */
    public function setDiagnosticosid(\Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid = null)
    {
        $this->diagnosticosid = $diagnosticosid;

        return $this;
    }

    /**
     * Get diagnosticosid
     *
     * @return \Krytek\DataBundle\Entity\Diagnosticos
     */
    public function getDiagnosticosid()
    {
        return $this->diagnosticosid;
    }

    /**
     * Set nombreMedico
     *
     * @param string $nombreMedico
     *
     * @return SolicitudTransfusion
     */
    public function setNombreMedico($nombreMedico)
    {
        $this->nombreMedico = $nombreMedico;

        return $this;
    }

    /**
     * Get nombreMedico
     *
     * @return string
     */
    public function getNombreMedico()
    {
        return $this->nombreMedico;
    }

    /**
     * Set registroMedico
     *
     * @param string $registroMedico
     *
     * @return SolicitudTransfusion
     */
    public function setRegistroMedico($registroMedico)
    {
        $this->registroMedico = $registroMedico;

        return $this;
    }

    /**
     * Get registroMedico
     *
     * @return string
     */
    public function getRegistroMedico()
    {
        return $this->registroMedico;
    }
}
