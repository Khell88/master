<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transfusionista
 *
 * @ORM\Table(name="transfusionista", uniqueConstraints={@ORM\UniqueConstraint(name="transfusionista_ci_transfusionista_key", columns={"ci_transfusionista"})}, indexes={@ORM\Index(name="IDX_C1D7D9087B4DD5A0", columns={"usuarioid"})})
 * @ORM\Entity
 */
class Transfusionista
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="transfusionista_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ci_transfusionista", type="bigint", nullable=false)
     */
    private $ciTransfusionista;

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
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     * })
     */
    private $usuarioid;


}

