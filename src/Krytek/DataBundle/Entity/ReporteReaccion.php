<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReporteReaccion
 *
 * @ORM\Table(name="reporte_reaccion", indexes={@ORM\Index(name="IDX_16BC525864FDF06E", columns={"usuarioid"})})
 * @ORM\Entity
 */
class ReporteReaccion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="reporte_reaccion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_reporta", type="string", length=255, nullable=false)
     */
    private $unidadReporta;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=255, nullable=false)
     */
    private $provincia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reaccion", type="date", nullable=false)
     */
    private $fechaReaccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_reaccion", type="time", nullable=false)
     */
    private $horaReaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha_transf_unk", type="string", length=1, nullable=true)
     */
    private $fechaTransfUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra", type="string", length=1, nullable=false)
     */
    private $muestra;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_reaccion", type="string", length=255, nullable=false)
     */
    private $lugarReaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="incidente_rat", type="string", length=255, nullable=false)
     */
    private $incidenteRat;

    /**
     * @var string
     *
     * @ORM\Column(name="antecedente_trans_unk", type="string", length=1, nullable=true)
     */
    private $antecedenteTransUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="componente_unk", type="string", length=1, nullable=true)
     */
    private $componenteUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="antecedente_reaccion_unk", type="string", length=1, nullable=true)
     */
    private $antecedenteReaccionUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="embarazos_unk", type="string", length=1, nullable=true)
     */
    private $embarazosUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="abortos_unk", type="string", length=1, nullable=true)
     */
    private $abortosUnk;

    /**
     * @var string
     *
     * @ORM\Column(name="antecedente_quirurgico", type="string", length=1, nullable=false)
     */
    private $antecedenteQuirurgico;

    /**
     * @var string
     *
     * @ORM\Column(name="inmunosupresion", type="string", length=1, nullable=true)
     */
    private $inmunosupresion;

    /**
     * @var string
     *
     * @ORM\Column(name="medicamentos_previos", type="string", length=255, nullable=true)
     */
    private $medicamentosPrevios;

    /**
     * @var integer
     *
     * @ORM\Column(name="medida_tomada", type="integer", nullable=false)
     */
    private $medidaTomada;

    /**
     * @var integer
     *
     * @ORM\Column(name="desenlace", type="integer", nullable=false)
     */
    private $desenlace;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_rat", type="string", length=255, nullable=true)
     */
    private $descripcionRat;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra_orina", type="string", length=1, nullable=false)
     */
    private $muestraOrina;

    /**
     * @var string
     *
     * @ORM\Column(name="envio_remanente", type="string", length=1, nullable=false)
     */
    private $envioRemanente;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra_posttransf", type="string", length=1, nullable=false)
     */
    private $muestraPosttransf;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra_labclin", type="string", length=1, nullable=false)
     */
    private $muestraLabclin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_notificacion", type="date", nullable=true)
     */
    private $fechaNotificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="sintomas_signos", type="string", length=255, nullable=false)
     */
    private $sintomasSignos;

    /**
     * @var integer
     *
     * @ORM\Column(name="incidente_transf", type="integer", nullable=false)
     */
    private $incidenteTransf;

    /**
     * @var \Medico
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
     * Constructor
     */
    public function __construct()
    {
        $this->pacienteid = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set unidadReporta
     *
     * @param string $unidadReporta
     *
     * @return ReporteReaccion
     */
    public function setUnidadReporta($unidadReporta)
    {
        $this->unidadReporta = $unidadReporta;

        return $this;
    }

    /**
     * Get unidadReporta
     *
     * @return string
     */
    public function getUnidadReporta()
    {
        return $this->unidadReporta;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     *
     * @return ReporteReaccion
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set fechaReaccion
     *
     * @param \DateTime $fechaReaccion
     *
     * @return ReporteReaccion
     */
    public function setFechaReaccion($fechaReaccion)
    {
        $this->fechaReaccion = $fechaReaccion;

        return $this;
    }

    /**
     * Get fechaReaccion
     *
     * @return \DateTime
     */
    public function getFechaReaccion()
    {
        return $this->fechaReaccion;
    }

    /**
     * Set horaReaccion
     *
     * @param \DateTime $horaReaccion
     *
     * @return ReporteReaccion
     */
    public function setHoraReaccion($horaReaccion)
    {
        $this->horaReaccion = $horaReaccion;

        return $this;
    }

    /**
     * Get horaReaccion
     *
     * @return \DateTime
     */
    public function getHoraReaccion()
    {
        return $this->horaReaccion;
    }

    /**
     * Set fechaTransfUnk
     *
     * @param string $fechaTransfUnk
     *
     * @return ReporteReaccion
     */
    public function setFechaTransfUnk($fechaTransfUnk)
    {
        $this->fechaTransfUnk = $fechaTransfUnk;

        return $this;
    }

    /**
     * Get fechaTransfUnk
     *
     * @return string
     */
    public function getFechaTransfUnk()
    {
        return $this->fechaTransfUnk;
    }

    /**
     * Set muestra
     *
     * @param string $muestra
     *
     * @return ReporteReaccion
     */
    public function setMuestra($muestra)
    {
        $this->muestra = $muestra;

        return $this;
    }

    /**
     * Get muestra
     *
     * @return string
     */
    public function getMuestra()
    {
        return $this->muestra;
    }

    /**
     * Set lugarReaccion
     *
     * @param string $lugarReaccion
     *
     * @return ReporteReaccion
     */
    public function setLugarReaccion($lugarReaccion)
    {
        $this->lugarReaccion = $lugarReaccion;

        return $this;
    }

    /**
     * Get lugarReaccion
     *
     * @return string
     */
    public function getLugarReaccion()
    {
        return $this->lugarReaccion;
    }

    /**
     * Set incidenteRat
     *
     * @param string $incidenteRat
     *
     * @return ReporteReaccion
     */
    public function setIncidenteRat($incidenteRat)
    {
        $this->incidenteRat = $incidenteRat;

        return $this;
    }

    /**
     * Get incidenteRat
     *
     * @return string
     */
    public function getIncidenteRat()
    {
        return $this->incidenteRat;
    }

    /**
     * Set antecedenteTransUnk
     *
     * @param string $antecedenteTransUnk
     *
     * @return ReporteReaccion
     */
    public function setAntecedenteTransUnk($antecedenteTransUnk)
    {
        $this->antecedenteTransUnk = $antecedenteTransUnk;

        return $this;
    }

    /**
     * Get antecedenteTransUnk
     *
     * @return string
     */
    public function getAntecedenteTransUnk()
    {
        return $this->antecedenteTransUnk;
    }

    /**
     * Set componenteUnk
     *
     * @param string $componenteUnk
     *
     * @return ReporteReaccion
     */
    public function setComponenteUnk($componenteUnk)
    {
        $this->componenteUnk = $componenteUnk;

        return $this;
    }

    /**
     * Get componenteUnk
     *
     * @return string
     */
    public function getComponenteUnk()
    {
        return $this->componenteUnk;
    }

    /**
     * Set antecedenteReaccionUnk
     *
     * @param string $antecedenteReaccionUnk
     *
     * @return ReporteReaccion
     */
    public function setAntecedenteReaccionUnk($antecedenteReaccionUnk)
    {
        $this->antecedenteReaccionUnk = $antecedenteReaccionUnk;

        return $this;
    }

    /**
     * Get antecedenteReaccionUnk
     *
     * @return string
     */
    public function getAntecedenteReaccionUnk()
    {
        return $this->antecedenteReaccionUnk;
    }

    /**
     * Set embarazosUnk
     *
     * @param string $embarazosUnk
     *
     * @return ReporteReaccion
     */
    public function setEmbarazosUnk($embarazosUnk)
    {
        $this->embarazosUnk = $embarazosUnk;

        return $this;
    }

    /**
     * Get embarazosUnk
     *
     * @return string
     */
    public function getEmbarazosUnk()
    {
        return $this->embarazosUnk;
    }

    /**
     * Set abortosUnk
     *
     * @param string $abortosUnk
     *
     * @return ReporteReaccion
     */
    public function setAbortosUnk($abortosUnk)
    {
        $this->abortosUnk = $abortosUnk;

        return $this;
    }

    /**
     * Get abortosUnk
     *
     * @return string
     */
    public function getAbortosUnk()
    {
        return $this->abortosUnk;
    }

    /**
     * Set antecedenteQuirurgico
     *
     * @param string $antecedenteQuirurgico
     *
     * @return ReporteReaccion
     */
    public function setAntecedenteQuirurgico($antecedenteQuirurgico)
    {
        $this->antecedenteQuirurgico = $antecedenteQuirurgico;

        return $this;
    }

    /**
     * Get antecedenteQuirurgico
     *
     * @return string
     */
    public function getAntecedenteQuirurgico()
    {
        return $this->antecedenteQuirurgico;
    }

    /**
     * Set inmunosupresion
     *
     * @param string $inmunosupresion
     *
     * @return ReporteReaccion
     */
    public function setInmunosupresion($inmunosupresion)
    {
        $this->inmunosupresion = $inmunosupresion;

        return $this;
    }

    /**
     * Get inmunosupresion
     *
     * @return string
     */
    public function getInmunosupresion()
    {
        return $this->inmunosupresion;
    }

    /**
     * Set medicamentosPrevios
     *
     * @param string $medicamentosPrevios
     *
     * @return ReporteReaccion
     */
    public function setMedicamentosPrevios($medicamentosPrevios)
    {
        $this->medicamentosPrevios = $medicamentosPrevios;

        return $this;
    }

    /**
     * Get medicamentosPrevios
     *
     * @return string
     */
    public function getMedicamentosPrevios()
    {
        return $this->medicamentosPrevios;
    }

    /**
     * Set medidaTomada
     *
     * @param integer $medidaTomada
     *
     * @return ReporteReaccion
     */
    public function setMedidaTomada($medidaTomada)
    {
        $this->medidaTomada = $medidaTomada;

        return $this;
    }

    /**
     * Get medidaTomada
     *
     * @return integer
     */
    public function getMedidaTomada()
    {
        return $this->medidaTomada;
    }

    /**
     * Set desenlace
     *
     * @param integer $desenlace
     *
     * @return ReporteReaccion
     */
    public function setDesenlace($desenlace)
    {
        $this->desenlace = $desenlace;

        return $this;
    }

    /**
     * Get desenlace
     *
     * @return integer
     */
    public function getDesenlace()
    {
        return $this->desenlace;
    }

    /**
     * Set descripcionRat
     *
     * @param string $descripcionRat
     *
     * @return ReporteReaccion
     */
    public function setDescripcionRat($descripcionRat)
    {
        $this->descripcionRat = $descripcionRat;

        return $this;
    }

    /**
     * Get descripcionRat
     *
     * @return string
     */
    public function getDescripcionRat()
    {
        return $this->descripcionRat;
    }

    /**
     * Set muestraOrina
     *
     * @param string $muestraOrina
     *
     * @return ReporteReaccion
     */
    public function setMuestraOrina($muestraOrina)
    {
        $this->muestraOrina = $muestraOrina;

        return $this;
    }

    /**
     * Get muestraOrina
     *
     * @return string
     */
    public function getMuestraOrina()
    {
        return $this->muestraOrina;
    }

    /**
     * Set envioRemanente
     *
     * @param string $envioRemanente
     *
     * @return ReporteReaccion
     */
    public function setEnvioRemanente($envioRemanente)
    {
        $this->envioRemanente = $envioRemanente;

        return $this;
    }

    /**
     * Get envioRemanente
     *
     * @return string
     */
    public function getEnvioRemanente()
    {
        return $this->envioRemanente;
    }

    /**
     * Set muestraPosttransf
     *
     * @param string $muestraPosttransf
     *
     * @return ReporteReaccion
     */
    public function setMuestraPosttransf($muestraPosttransf)
    {
        $this->muestraPosttransf = $muestraPosttransf;

        return $this;
    }

    /**
     * Get muestraPosttransf
     *
     * @return string
     */
    public function getMuestraPosttransf()
    {
        return $this->muestraPosttransf;
    }

    /**
     * Set muestraLabclin
     *
     * @param string $muestraLabclin
     *
     * @return ReporteReaccion
     */
    public function setMuestraLabclin($muestraLabclin)
    {
        $this->muestraLabclin = $muestraLabclin;

        return $this;
    }

    /**
     * Get muestraLabclin
     *
     * @return string
     */
    public function getMuestraLabclin()
    {
        return $this->muestraLabclin;
    }

    /**
     * Set fechaNotificacion
     *
     * @param \DateTime $fechaNotificacion
     *
     * @return ReporteReaccion
     */
    public function setFechaNotificacion($fechaNotificacion)
    {
        $this->fechaNotificacion = $fechaNotificacion;

        return $this;
    }

    /**
     * Get fechaNotificacion
     *
     * @return \DateTime
     */
    public function getFechaNotificacion()
    {
        return $this->fechaNotificacion;
    }

    /**
     * Set sintomasSignos
     *
     * @param string $sintomasSignos
     *
     * @return ReporteReaccion
     */
    public function setSintomasSignos($sintomasSignos)
    {
        $this->sintomasSignos = $sintomasSignos;

        return $this;
    }

    /**
     * Get sintomasSignos
     *
     * @return string
     */
    public function getSintomasSignos()
    {
        return $this->sintomasSignos;
    }

    /**
     * Set incidenteTransf
     *
     * @param integer $incidenteTransf
     *
     * @return ReporteReaccion
     */
    public function setIncidenteTransf($incidenteTransf)
    {
        $this->incidenteTransf = $incidenteTransf;

        return $this;
    }

    /**
     * Get incidenteTransf
     *
     * @return integer
     */
    public function getIncidenteTransf()
    {
        return $this->incidenteTransf;
    }

    /**
     * Set usuarioid
     *
     * @param \Krytek\DataBundle\Entity\Usuario $usuarioid
     *
     * @return ReporteReaccion
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
     * Set pacienteid
     *
     * @param \Krytek\DataBundle\Entity\Paciente $pacienteid
     *
     * @return ReporteReaccion
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
}
