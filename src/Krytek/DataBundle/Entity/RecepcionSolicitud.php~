<?php

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecepcionSolicitud
 *
 * @ORM\Table(name="recepcion_solicitud", indexes={@ORM\Index(name="IDX_A902C000884F88C5", columns={"solicitud_transfusionid"}), @ORM\Index(name="IDX_A902C00088EF46FF", columns={"usuarioid"})})
 * @ORM\Entity
 */
class RecepcionSolicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="recepcion_solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra", type="string", length=2, nullable=false)
     */
    private $muestra;

    /**
     * @var string
     *
     * @ORM\Column(name="pc_tipo_sangre", type="string", length=255, nullable=false)
     */
    private $pcTipoSangre;

    /**
     * @var string
     *
     * @ORM\Column(name="pc_rh", type="string", length=255, nullable=false)
     */
    private $pcRh;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_antes_temp", type="string", length=255, nullable=true)
     */
    private $pbAntesTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_antes_ta", type="string", length=255, nullable=true)
     */
    private $pbAntesTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_antes_fc", type="string", length=255, nullable=true)
     */
    private $pbAntesFc;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_dur_temp", type="string", length=255, nullable=true)
     */
    private $pbDurTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_dur_ta", type="string", length=255, nullable=true)
     */
    private $pbDurTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_dur_fc", type="string", length=255, nullable=true)
     */
    private $pbDurFc;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_des_temp", type="string", length=255, nullable=true)
     */
    private $pbDesTemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_des_ta", type="string", length=255, nullable=true)
     */
    private $pbDesTa;

    /**
     * @var string
     *
     * @ORM\Column(name="pb_des_fc", type="string", length=255, nullable=true)
     */
    private $pbDesFc;

    /**
     * @var string
     *
     * @ORM\Column(name="causa_no_pruebas", type="string", length=255, nullable=true)
     */
    private $causaNoPruebas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_transfusion", type="date", nullable=false)
     */
    private $fechaTransfusion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_transfusion", type="time", nullable=false)
     */
    private $horaTransfusion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recepcion", type="date", nullable=false)
     */
    private $fechaRecepcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_recepcion", type="time", nullable=false)
     */
    private $horaRecepcion;

    /**
     * @var string
     *
     * @ORM\Column(name="reaccion_transfusional", type="string", length=2, nullable=false)
     */
    private $reaccionTransfusional;

    /**
     * @var string
     *
     * @ORM\Column(name="muestra_reaccion", type="string", length=2, nullable=false)
     */
    private $muestraReaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="prueba_postransfusional", type="string", length=2, nullable=false)
     */
    private $pruebaPostransfusional;

    /**
     * @var string
     *
     * @ORM\Column(name="notificacion", type="string", length=2, nullable=false)
     */
    private $notificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cultivo_postransfusional", type="string", length=2, nullable=false)
     */
    private $cultivoPostransfusional;

    /**
     * @var \SolicitudTransfusion
     *
     * @ORM\ManyToOne(targetEntity="SolicitudTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="solicitud_transfusionid", referencedColumnName="id")
     * })
     */
    private $solicitudTransfusionid;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioid", referencedColumnName="id")
     * })
     */
    private $usuarioid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Bolsa", mappedBy="recepcionSolicitudid")
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
     * Set muestra
     *
     * @param string $muestra
     *
     * @return RecepcionSolicitud
     */
    public function setMuestra($muestra)
    {
        $this->muestra = $muestra;

        return $this;
    }

    /**
     * Get muestra
     *
     * @return string
     */
    public function getMuestra()
    {
        return $this->muestra;
    }

    /**
     * Set hcBolsa
     *
     * @param integer $hcBolsa
     *
     * @return RecepcionSolicitud
     */
    public function setHcBolsa($hcBolsa)
    {
        $this->hcBolsa = $hcBolsa;

        return $this;
    }

    /**
     * Get hcBolsa
     *
     * @return integer
     */
    public function getHcBolsa()
    {
        return $this->hcBolsa;
    }

    /**
     * Set pcTipoSangre
     *
     * @param string $pcTipoSangre
     *
     * @return RecepcionSolicitud
     */
    public function setPcTipoSangre($pcTipoSangre)
    {
        $this->pcTipoSangre = $pcTipoSangre;

        return $this;
    }

    /**
     * Get pcTipoSangre
     *
     * @return string
     */
    public function getPcTipoSangre()
    {
        return $this->pcTipoSangre;
    }

    /**
     * Set pcRh
     *
     * @param string $pcRh
     *
     * @return RecepcionSolicitud
     */
    public function setPcRh($pcRh)
    {
        $this->pcRh = $pcRh;

        return $this;
    }

    /**
     * Get pcRh
     *
     * @return string
     */
    public function getPcRh()
    {
        return $this->pcRh;
    }

    /**
     * Set pbAntesTemp
     *
     * @param integer $pbAntesTemp
     *
     * @return RecepcionSolicitud
     */
    public function setPbAntesTemp($pbAntesTemp)
    {
        $this->pbAntesTemp = $pbAntesTemp;

        return $this;
    }

    /**
     * Get pbAntesTemp
     *
     * @return integer
     */
    public function getPbAntesTemp()
    {
        return $this->pbAntesTemp;
    }

    /**
     * Set pbAntesTa
     *
     * @param string $pbAntesTa
     *
     * @return RecepcionSolicitud
     */
    public function setPbAntesTa($pbAntesTa)
    {
        $this->pbAntesTa = $pbAntesTa;

        return $this;
    }

    /**
     * Get pbAntesTa
     *
     * @return string
     */
    public function getPbAntesTa()
    {
        return $this->pbAntesTa;
    }

    /**
     * Set pbAntesFc
     *
     * @param string $pbAntesFc
     *
     * @return RecepcionSolicitud
     */
    public function setPbAntesFc($pbAntesFc)
    {
        $this->pbAntesFc = $pbAntesFc;

        return $this;
    }

    /**
     * Get pbAntesFc
     *
     * @return string
     */
    public function getPbAntesFc()
    {
        return $this->pbAntesFc;
    }

    /**
     * Set pbDurTemp
     *
     * @param integer $pbDurTemp
     *
     * @return RecepcionSolicitud
     */
    public function setPbDurTemp($pbDurTemp)
    {
        $this->pbDurTemp = $pbDurTemp;

        return $this;
    }

    /**
     * Get pbDurTemp
     *
     * @return integer
     */
    public function getPbDurTemp()
    {
        return $this->pbDurTemp;
    }

    /**
     * Set pbDurTa
     *
     * @param string $pbDurTa
     *
     * @return RecepcionSolicitud
     */
    public function setPbDurTa($pbDurTa)
    {
        $this->pbDurTa = $pbDurTa;

        return $this;
    }

    /**
     * Get pbDurTa
     *
     * @return string
     */
    public function getPbDurTa()
    {
        return $this->pbDurTa;
    }

    /**
     * Set pbDurFc
     *
     * @param string $pbDurFc
     *
     * @return RecepcionSolicitud
     */
    public function setPbDurFc($pbDurFc)
    {
        $this->pbDurFc = $pbDurFc;

        return $this;
    }

    /**
     * Get pbDurFc
     *
     * @return string
     */
    public function getPbDurFc()
    {
        return $this->pbDurFc;
    }

    /**
     * Set pbDesTemp
     *
     * @param integer $pbDesTemp
     *
     * @return RecepcionSolicitud
     */
    public function setPbDesTemp($pbDesTemp)
    {
        $this->pbDesTemp = $pbDesTemp;

        return $this;
    }

    /**
     * Get pbDesTemp
     *
     * @return integer
     */
    public function getPbDesTemp()
    {
        return $this->pbDesTemp;
    }

    /**
     * Set pbDesTa
     *
     * @param string $pbDesTa
     *
     * @return RecepcionSolicitud
     */
    public function setPbDesTa($pbDesTa)
    {
        $this->pbDesTa = $pbDesTa;

        return $this;
    }

    /**
     * Get pbDesTa
     *
     * @return string
     */
    public function getPbDesTa()
    {
        return $this->pbDesTa;
    }

    /**
     * Set pbDesFc
     *
     * @param string $pbDesFc
     *
     * @return RecepcionSolicitud
     */
    public function setPbDesFc($pbDesFc)
    {
        $this->pbDesFc = $pbDesFc;

        return $this;
    }

    /**
     * Get pbDesFc
     *
     * @return string
     */
    public function getPbDesFc()
    {
        return $this->pbDesFc;
    }

    /**
     * Set causaNoPruebas
     *
     * @param string $causaNoPruebas
     *
     * @return RecepcionSolicitud
     */
    public function setCausaNoPruebas($causaNoPruebas)
    {
        $this->causaNoPruebas = $causaNoPruebas;

        return $this;
    }

    /**
     * Get causaNoPruebas
     *
     * @return string
     */
    public function getCausaNoPruebas()
    {
        return $this->causaNoPruebas;
    }

    /**
     * Set fechaTransfusion
     *
     * @param \DateTime $fechaTransfusion
     *
     * @return RecepcionSolicitud
     */
    public function setFechaTransfusion($fechaTransfusion)
    {
        $this->fechaTransfusion = $fechaTransfusion;

        return $this;
    }

    /**
     * Get fechaTransfusion
     *
     * @return \DateTime
     */
    public function getFechaTransfusion()
    {
        return $this->fechaTransfusion;
    }

    /**
     * Set horaTransfusion
     *
     * @param \DateTime $horaTransfusion
     *
     * @return RecepcionSolicitud
     */
    public function setHoraTransfusion($horaTransfusion)
    {
        $this->horaTransfusion = $horaTransfusion;

        return $this;
    }

    /**
     * Get horaTransfusion
     *
     * @return \DateTime
     */
    public function getHoraTransfusion()
    {
        return $this->horaTransfusion;
    }

    /**
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     *
     * @return RecepcionSolicitud
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set horaRecepcion
     *
     * @param \DateTime $horaRecepcion
     *
     * @return RecepcionSolicitud
     */
    public function setHoraRecepcion($horaRecepcion)
    {
        $this->horaRecepcion = $horaRecepcion;

        return $this;
    }

    /**
     * Get horaRecepcion
     *
     * @return \DateTime
     */
    public function getHoraRecepcion()
    {
        return $this->horaRecepcion;
    }

    /**
     * Set reaccionTransfusional
     *
     * @param string $reaccionTransfusional
     *
     * @return RecepcionSolicitud
     */
    public function setReaccionTransfusional($reaccionTransfusional)
    {
        $this->reaccionTransfusional = $reaccionTransfusional;

        return $this;
    }

    /**
     * Get reaccionTransfusional
     *
     * @return string
     */
    public function getReaccionTransfusional()
    {
        return $this->reaccionTransfusional;
    }

    /**
     * Set muestraReaccion
     *
     * @param string $muestraReaccion
     *
     * @return RecepcionSolicitud
     */
    public function setMuestraReaccion($muestraReaccion)
    {
        $this->muestraReaccion = $muestraReaccion;

        return $this;
    }

    /**
     * Get muestraReaccion
     *
     * @return string
     */
    public function getMuestraReaccion()
    {
        return $this->muestraReaccion;
    }

    /**
     * Set pruebaPostransfusional
     *
     * @param string $pruebaPostransfusional
     *
     * @return RecepcionSolicitud
     */
    public function setPruebaPostransfusional($pruebaPostransfusional)
    {
        $this->pruebaPostransfusional = $pruebaPostransfusional;

        return $this;
    }

    /**
     * Get pruebaPostransfusional
     *
     * @return string
     */
    public function getPruebaPostransfusional()
    {
        return $this->pruebaPostransfusional;
    }

    /**
     * Set notificacion
     *
     * @param string $notificacion
     *
     * @return RecepcionSolicitud
     */
    public function setNotificacion($notificacion)
    {
        $this->notificacion = $notificacion;

        return $this;
    }

    /**
     * Get notificacion
     *
     * @return string
     */
    public function getNotificacion()
    {
        return $this->notificacion;
    }

    /**
     * Set cultivoPostransfusional
     *
     * @param string $cultivoPostransfusional
     *
     * @return RecepcionSolicitud
     */
    public function setCultivoPostransfusional($cultivoPostransfusional)
    {
        $this->cultivoPostransfusional = $cultivoPostransfusional;

        return $this;
    }

    /**
     * Get cultivoPostransfusional
     *
     * @return string
     */
    public function getCultivoPostransfusional()
    {
        return $this->cultivoPostransfusional;
    }

    /**
     * Set solicitudTransfusionid
     *
     * @param \Krytek\DataBundle\Entity\SolicitudTransfusion $solicitudTransfusionid
     *
     * @return RecepcionSolicitud
     */
    public function setSolicitudTransfusionid(\Krytek\DataBundle\Entity\SolicitudTransfusion $solicitudTransfusionid = null)
    {
        $this->solicitudTransfusionid = $solicitudTransfusionid;

        return $this;
    }

    /**
     * Get solicitudTransfusionid
     *
     * @return \Krytek\DataBundle\Entity\SolicitudTransfusion
     */
    public function getSolicitudTransfusionid()
    {
        return $this->solicitudTransfusionid;
    }

    /**
     * Set usuarioid
     *
     * @param \Krytek\DataBundle\Entity\Usuario $usuarioid
     *
     * @return RecepcionSolicitud
     */
    public function setUsuarioid(\Krytek\DataBundle\Entity\Usuario $usuarioid = null)
    {
        $this->usuarioid = $usuarioid;

        return $this;
    }

    /**
     * Get usuarioid
     *
     * @return \Krytek\DataBundle\Entity\Usuario
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * Add bolsaid
     *
     * @param \Krytek\DataBundle\Entity\Bolsa $bolsaid
     *
     * @return RecepcionSolicitud
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
