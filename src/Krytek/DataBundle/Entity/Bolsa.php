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

}

