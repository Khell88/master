<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Paciente
 *
 * @ORM\Table(name="paciente", uniqueConstraints={@ORM\UniqueConstraint(name="paciente_ci_paciente_key", columns={"ci_paciente"}), @ORM\UniqueConstraint(name="paciente_id_hc_key", columns={"id_hc"})})
 * @ORM\Entity(repositoryClass="Krytek\DataBundle\Entity\PacienteRepository")
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
     *
     * @ORM\Column(name="ci_paciente", type="string", nullable=false, unique=true)
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
     * @var integer
     *
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ciPaciente
     *
     * @param integer $ciPaciente
     *
     * @return Paciente
     */
    public function setCiPaciente($ciPaciente)
    {
        $this->ciPaciente = $ciPaciente;

        return $this;
    }

    /**
     * Get ciPaciente
     *
     * @return integer
     */
    public function getCiPaciente()
    {
        return $this->ciPaciente;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Paciente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Paciente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Paciente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set tipoSangre
     *
     * @param string $tipoSangre
     *
     * @return Paciente
     */
    public function setTipoSangre($tipoSangre)
    {
        $this->tipoSangre = $tipoSangre;

        return $this;
    }

    /**
     * Get tipoSangre
     *
     * @return string
     */
    public function getTipoSangre()
    {
        return $this->tipoSangre;
    }

    /**
     * Set idHc
     *
     * @param integer $idHc
     *
     * @return Paciente
     */
    public function setIdHc($idHc)
    {
        $this->idHc = $idHc;

        return $this;
    }

    /**
     * Get idHc
     *
     * @return integer
     */
    public function getIdHc()
    {
        return $this->idHc;
    }

    /**
     * Set peso
     *
     * @param float $peso
     *
     * @return Paciente
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return float
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set lactante
     *
     * @param string $lactante
     *
     * @return Paciente
     */
    public function setLactante($lactante)
    {
        $this->lactante = $lactante;

        return $this;
    }

    /**
     * Get lactante
     *
     * @return string
     */
    public function getLactante()
    {
        return $this->lactante;
    }

    /**
     * Set embarazos
     *
     * @param string $embarazos
     *
     * @return Paciente
     */
    public function setEmbarazos($embarazos)
    {
        $this->embarazos = $embarazos;

        return $this;
    }

    /**
     * Get embarazos
     *
     * @return string
     */
    public function getEmbarazos()
    {
        return $this->embarazos;
    }

    /**
     * Set rh
     *
     * @param string $rh
     *
     * @return Paciente
     */
    public function setRh($rh)
    {
        $this->rh = $rh;

        return $this;
    }

    /**
     * Get rh
     *
     * @return string
     */
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * Set abortos
     *
     * @param string $abortos
     *
     * @return Paciente
     */
    public function setAbortos($abortos)
    {
        $this->abortos = $abortos;

        return $this;
    }

    /**
     * Get abortos
     *
     * @return string
     */
    public function getAbortos()
    {
        return $this->abortos;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Paciente
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }
}
