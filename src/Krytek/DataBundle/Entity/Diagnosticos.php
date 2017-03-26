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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Diagnosticos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Add pacienteid
     *
     * @param \Krytek\DataBundle\Entity\Paciente $pacienteid
     *
     * @return Diagnosticos
     */
    public function addPacienteid(\Krytek\DataBundle\Entity\Paciente $pacienteid)
    {
        $this->pacienteid[] = $pacienteid;

        return $this;
    }

    /**
     * Remove pacienteid
     *
     * @param \Krytek\DataBundle\Entity\Paciente $pacienteid
     */
    public function removePacienteid(\Krytek\DataBundle\Entity\Paciente $pacienteid)
    {
        $this->pacienteid->removeElement($pacienteid);
    }

    /**
     * Get pacienteid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPacienteid()
    {
        return $this->pacienteid;
    }
}
