<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/19/2017
 * Time: 13:43
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;

class MotivoTransfusionRepository extends EntityRepository
{

    public function myFinder()
    {
        return $this->createQueryBuilder('mt')
            ->orderBy('mt.id')
            ->getQuery()
            ->getResult();
    }

    public function findMotivosComponentes($componente)
    {
        return $this->createQueryBuilder('mt')
            ->where('mt.componente = :componente')
            ->setParameter('componente', $componente)
            ->orderBy('mt.id')
            ->getQuery()
            ->getResult();

    }

    public function findMotivosDiagnostico($diagnosticoid)
    {
        return $this->createQueryBuilder('mt')
            ->where('mt.diagnosticosid = :diagnosticoid')
            ->setParameter('diagnosticoid', $diagnosticoid)
            ->orderBy('mt.id')
            ->getQuery()
            ->getResult();

    }


}