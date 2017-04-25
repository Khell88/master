<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PruebasLaboratorio
 *
 * @ORM\Table(name="pruebas_laboratorio")
 * @ORM\Entity
 */
class PruebasLaboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pruebas_laboratorio_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\ManyToMany(targetEntity="Bolsa", mappedBy="pruebasLaboratorioid")
     */
    private $bolsaid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bolsaid = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return PruebasLaboratorio
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
     * Add bolsaid
     *
     * @param \Krytek\DataBundle\Entity\Bolsa $bolsaid
     *
     * @return PruebasLaboratorio
     */
    public function addBolsaid(\Krytek\DataBundle\Entity\Bolsa $bolsaid)
    {
        $this->bolsaid[] = $bolsaid;

        return $this;
    }

    /**
     * Remove bolsaid
     *
     * @param \Krytek\DataBundle\Entity\Bolsa $bolsaid
     */
    public function removeBolsaid(\Krytek\DataBundle\Entity\Bolsa $bolsaid)
    {
        $this->bolsaid->removeElement($bolsaid);
    }

    /**
     * Get bolsaid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBolsaid()
    {
        return $this->bolsaid;
    }
}
