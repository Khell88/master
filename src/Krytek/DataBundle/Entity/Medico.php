<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table(name="medico", uniqueConstraints={@ORM\UniqueConstraint(name="medico_registro_profesional_key", columns={"registro_profesional"})}, indexes={@ORM\Index(name="IDX_34E5914C7B4DD5A0", columns={"usuarioid"})})
 * @ORM\Entity
 */
class Medico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="medico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var integer
     *
     * @ORM\Column(name="registro_profesional", type="bigint", nullable=false)
     */
    private $registroProfesional;

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

