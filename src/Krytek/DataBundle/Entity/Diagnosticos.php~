<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnosticos
 *
 * @ORM\Table(name="diagnosticos")
 * @ORM\Entity
 */
class Diagnosticos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="diagnosticos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Paciente", inversedBy="diagnosticosid")
     * @ORM\JoinTable(name="paciente_diagnosticos",
     *   joinColumns={
     *     @ORM\JoinColumn(name="diagnosticosid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pacienteid", referencedColumnName="id")
     *   }
     * )
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

