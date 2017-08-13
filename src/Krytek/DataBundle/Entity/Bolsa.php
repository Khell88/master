<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bolsa
 *
 * @ORM\Table(name="bolsa", uniqueConstraints={@ORM\UniqueConstraint(name="bolsa_codigo_key", columns={"codigo"})})
 * @ORM\Entity
 */
class Bolsa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="bolsa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="componente", type="string", length=255, nullable=false)
     */
    private $componente;

    /**
     * @var integer
     *
     * @ORM\Column(name="lote", type="integer", nullable=false)
     */
    private $lote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_donacion", type="date", nullable=false)
     */
    private $fechaDonacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="procedencia", type="string", length=255, nullable=false)
     */
    private $procedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="problemas", type="string", length=255, nullable=true)
     */
    private $problemas;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo_sanguineo", type="string", length=255, nullable=false)
     */
    private $grupoSanguineo;

    /**
     * @var string
     *
     * @ORM\Column(name="rh", type="string", length=255, nullable=false)
     */
    private $rh;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra", type="string", length=255, nullable=false)
     */
    private $muestra;

    /**
     * @var integer
     *
     * @ORM\Column(name="volumen", type="integer", nullable=false)
     */
    private $volumen;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado", type="integer", nullable=true)
     */
    private $estado;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PruebasLaboratorio", inversedBy="bolsaid")
     * @ORM\JoinTable(name="bolsa_pruebas_laboratorio",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bolsaid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pruebas_laboratorioid", referencedColumnName="id")
     *   }
     * )
     */
    private $pruebasLaboratorioid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="RecepcionSolicitud", inversedBy="bolsaid")
     * @ORM\JoinTable(name="bolsa_recepcion_solicitud",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bolsaid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="recepcion_solicitudid", referencedColumnName="id")
     *   }
     * )
     */
    private $recepcionSolicitudid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pruebasLaboratorioid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->recepcionSolicitudid = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Bolsa
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set componente
     *
     * @param string $componente
     *
     * @return Bolsa
     */
    public function setComponente($componente)
    {
        $this->componente = $componente;

        return $this;
    }

    /**
     * Get componente
     *
     * @return string
     */
    public function getComponente()
    {
        return $this->componente;
    }

    /**
     * Set lote
     *
     * @param integer $lote
     *
     * @return Bolsa
     */
    public function setLote($lote)
    {
        $this->lote = $lote;

        return $this;
    }

    /**
     * Get lote
     *
     * @return integer
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * Set fechaDonacion
     *
     * @param \DateTime $fechaDonacion
     *
     * @return Bolsa
     */
    public function setFechaDonacion($fechaDonacion)
    {
        $this->fechaDonacion = $fechaDonacion;

        return $this;
    }

    /**
     * Get fechaDonacion
     *
     * @return \DateTime
     */
    public function getFechaDonacion()
    {
        return $this->fechaDonacion;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     *
     * @return Bolsa
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set procedencia
     *
     * @param string $procedencia
     *
     * @return Bolsa
     */
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    /**
     * Get procedencia
     *
     * @return string
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set problemas
     *
     * @param string $problemas
     *
     * @return Bolsa
     */
    public function setProblemas($problemas)
    {
        $this->problemas = $problemas;

        return $this;
    }

    /**
     * Get problemas
     *
     * @return string
     */
    public function getProblemas()
    {
        return $this->problemas;
    }

    /**
     * Set grupoSanguineo
     *
     * @param string $grupoSanguineo
     *
     * @return Bolsa
     */
    public function setGrupoSanguineo($grupoSanguineo)
    {
        $this->grupoSanguineo = $grupoSanguineo;

        return $this;
    }

    /**
     * Get grupoSanguineo
     *
     * @return string
     */
    public function getGrupoSanguineo()
    {
        return $this->grupoSanguineo;
    }

    /**
     * Set rh
     *
     * @param string $rh
     *
     * @return Bolsa
     */
    public function setRh($rh)
    {
        $this->rh = $rh;

        return $this;
    }

    /**
     * Get rh
     *
     * @return string
     */
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * Set muestra
     *
     * @param string $muestra
     *
     * @return Bolsa
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
     * Set volumen
     *
     * @param integer $volumen
     *
     * @return Bolsa
     */
    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;

        return $this;
    }

    /**
     * Get volumen
     *
     * @return integer
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * Add pruebasLaboratorioid
     *
     * @param \Krytek\DataBundle\Entity\PruebasLaboratorio $pruebasLaboratorioid
     *
     * @return Bolsa
     */
    public function addPruebasLaboratorioid(\Krytek\DataBundle\Entity\PruebasLaboratorio $pruebasLaboratorioid)
    {
        $this->pruebasLaboratorioid[] = $pruebasLaboratorioid;

        return $this;
    }

    /**
     * Remove pruebasLaboratorioid
     *
     * @param \Krytek\DataBundle\Entity\PruebasLaboratorio $pruebasLaboratorioid
     */
    public function removePruebasLaboratorioid(\Krytek\DataBundle\Entity\PruebasLaboratorio $pruebasLaboratorioid)
    {
        $this->pruebasLaboratorioid->removeElement($pruebasLaboratorioid);
    }

    /**
     * Get pruebasLaboratorioid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPruebasLaboratorioid()
    {
        return $this->pruebasLaboratorioid;
    }

    /**
     * Add recepcionSolicitudid
     *
     * @param \Krytek\DataBundle\Entity\RecepcionSolicitud $recepcionSolicitudid
     *
     * @return Bolsa
     */
    public function addRecepcionSolicitudid(\Krytek\DataBundle\Entity\RecepcionSolicitud $recepcionSolicitudid)
    {
        $this->recepcionSolicitudid[] = $recepcionSolicitudid;

        return $this;
    }

    /**
     * Remove recepcionSolicitudid
     *
     * @param \Krytek\DataBundle\Entity\RecepcionSolicitud $recepcionSolicitudid
     */
    public function removeRecepcionSolicitudid(\Krytek\DataBundle\Entity\RecepcionSolicitud $recepcionSolicitudid)
    {
        $this->recepcionSolicitudid->removeElement($recepcionSolicitudid);
    }

    /**
     * Get recepcionSolicitudid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecepcionSolicitudid()
    {
        return $this->recepcionSolicitudid;
    }

    /**
     * Set enUso
     *
     * @param integer $estado
     *
     * @return Bolsa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get enUso
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
