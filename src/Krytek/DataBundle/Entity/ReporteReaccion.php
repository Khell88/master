<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReporteReaccion
 *
 * @ORM\Table(name="reporte_reaccion", indexes={@ORM\Index(name="IDX_16BC525864FDF06E", columns={"medicoid"})})
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
     * @ORM\ManyToOne(targetEntity="Medico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medicoid", referencedColumnName="id")
     * })
     */
    private $medicoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Paciente", mappedBy="reporteReaccionid")
     */
    private $pacienteid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pacienteid = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

