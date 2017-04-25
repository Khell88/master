<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MotivoTrasnfusion
 *
 * @ORM\Table(name="motivo_transfusion")
 * @ORM\Entity(repositoryClass="Krytek\DataBundle\Entity\MotivoTransfusionRepository")
 */
class MotivoTransfusion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="motivo_transfusion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false, unique=true)
     */
    private $descripcion;
    /**
     * @var string
     *
     * @ORM\Column(name="componente", type="string", length=255, nullable=false,)
     */
    private $componente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Diagnosticos", mappedBy="motivoTransfusionid")
     */
    private $diagnosticosid;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diagnosticosid = new ArrayCollection();
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
     * @return MotivoTransfusion
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
     * Set componente
     *
     * @param string $componente
     *
     * @return MotivoTransfusion
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
     * Add diagnosticosid
     *
     * @param \Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid
     *
     * @return MotivoTransfusion
     */
    public function addDiagnosticosid(\Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid)
    {
        if (!$this->diagnosticosid->contains($diagnosticosid)) {
            $this->diagnosticosid->add($diagnosticosid);
            $diagnosticosid->addMotivoTransfusionid($this);
        }
    }

    /**
     * Remove diagnosticosid
     *
     * @param \Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid
     */
    public function removeDiagnosticosid(\Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid)
    {
        if(!$this->diagnosticosid->contains($diagnosticosid)){
            return;
        }
        $this->diagnosticosid->removeElement($diagnosticosid);
        $diagnosticosid->removeDiagnosticosid($this);
    }

    /**
     * Get diagnosticosid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiagnosticosid()
    {
        return $this->diagnosticosid->toArray();
    }
}
