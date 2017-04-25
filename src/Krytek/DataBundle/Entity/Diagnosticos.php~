<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnosticos
 *
 * @ORM\Table(name="diagnosticos")
 * @ORM\Entity(repositoryClass="Krytek\DataBundle\Entity\DiagnosticosRepository")
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
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false, unique=true)
     */
    private $descripcion;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MotivoTransfusion", inversedBy="diagnosticosid")
     * @ORM\JoinTable(name="diagnosticos_motivo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="diagnosticosid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="motivo_transfusionid", referencedColumnName="id")
     *   }
     * )
     */
    private $motivoTransfusionid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->motivoTransfusionid = new ArrayCollection();
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
     * Add motivoTransfusionid
     *
     * @param \Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid
     *
     * @return Diagnosticos
     */
    public function addMotivoTransfusionid(\Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid)
    {
        if (!$this->motivoTransfusionid->contains($motivoTransfusionid)) {
            $this->motivoTransfusionid->add($motivoTransfusionid);
            $motivoTransfusionid->addDiagnosticosid($this);
        }
    }

    /**
     * Remove motivoTransfusionid
     *
     * @param \Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid
     */
    public function removeMotivoTransfusionid(\Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid)
    {
        if(!$this->motivoTransfusionid->contains($motivoTransfusionid)){
            return;
        }
        $this->motivoTransfusionid->removeElement($motivoTransfusionid);
        $motivoTransfusionid->removeDiagnosticosid($this);
    }

    /**
     * Get motivoTransfusionid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMotivoTransfusionid()
    {
        return $this->motivoTransfusionid->toArray();
    }
}
