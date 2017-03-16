<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente", uniqueConstraints={@ORM\UniqueConstraint(name="paciente_ci_paciente_key", columns={"ci_paciente"}), @ORM\UniqueConstraint(name="paciente_id_hc_key", columns={"id_hc"})})
 * @ORM\Entity
 */
class Paciente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="paciente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ci_paciente", type="bigint", nullable=false)
     */
    private $ciPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_sangre", type="string", length=3, nullable=false)
     */
    private $tipoSangre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_hc", type="integer", nullable=false)
     */
    private $idHc;

    /**
     * @var float
     *
     * @ORM\Column(name="peso", type="float", precision=10, scale=0, nullable=false)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="lactante", type="string", length=255, nullable=true)
     */
    private $lactante;

    /**
     * @var string
     *
     * @ORM\Column(name="embarazos", type="string", length=255, nullable=true)
     */
    private $embarazos;

    /**
     * @var string
     *
     * @ORM\Column(name="rh", type="string", length=255, nullable=false)
     */
    private $rh;

    /**
     * @var string
     *
     * @ORM\Column(name="abortos", type="string", length=255, nullable=true)
     */
    private $abortos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ReporteReaccion", inversedBy="pacienteid")
     * @ORM\JoinTable(name="paciente_reacciones_tranfusion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pacienteid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="reporte_reaccionid", referencedColumnName="id")
     *   }
     * )
     */
    private $reporteReaccionid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Diagnosticos", mappedBy="pacienteid")
     */
    private $diagnosticosid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reporteReaccionid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->diagnosticosid = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

