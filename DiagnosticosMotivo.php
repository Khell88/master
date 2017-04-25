<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/22/2017
 * Time: 17:41
 */

namespace Krytek\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * DiagnosticosMotivo
 *
 * @ORM\Table(name="diagnosticos_motivo", indexes={@ORM\Index(name="idx_ef4364684bc3059e", columns={"diagnosticosid"}),@ORM\Index(name="idx_ef436468ce1411db", columns={"motivo_transfusionid"})})
 * @ORM\Entity
 */
class DiagnosticosMotivo
{

    /**
     * @var \Diagnosticos
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Diagnosticos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="diagnosticosid", referencedColumnName="id")
     * })
     */
    private $diagnosticosid;

    /**
     * @var \MotivoTransfusion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MotivoTransfusion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivo_transfusionid", referencedColumnName="id")
     * })
     */
    private $motivoTransfusionid;


    /**
     * Set motivoTransfusionid
     *
     * @param \Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid
     *
     * @return DiagnoticosMotivo
     */
    public function setMotivoTransfusionid(\Krytek\DataBundle\Entity\MotivoTransfusion $motivoTransfusionid)
    {
        $this->motivoTransfusionid = $motivoTransfusionid;

        return $this;
    }

    /**
     * Get motivoTransfusionid
     *
     * @return \Krytek\DataBundle\Entity\MotivoTransfusion
     */
    public function getMotivoTransfusionid()
    {
        return $this->motivoTransfusionid;
    }

    /**
     * Set diagnosticosid
     *
     * @param \Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid
     *
     * @return DiagnoticosMotivo
     */
    public function setDiagnosticosid(\Krytek\DataBundle\Entity\Diagnosticos $diagnosticosid)
    {
        $this->diagnosticosid = $diagnosticosid;

        return $this;
    }

    /**
     * Get diagnosticosid
     *
     * @return \Krytek\DataBundle\Entity\Diagnosticos
     */
    public function getDiagnosticosid()
    {
        return $this->diagnosticosid;
    }
}
