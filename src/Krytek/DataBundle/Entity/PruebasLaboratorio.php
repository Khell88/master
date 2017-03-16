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

}

