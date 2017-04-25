<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/24/2017
 * Time: 22:16
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;

class DiagnosticosRepository extends EntityRepository
{
    public function findDiagnoticoById($diagnosticoid)
    {
        return $this->createQueryBuilder('d')
            ->where('d.id = :diagnosticoid')
            ->setParameter('diagnosticoid', $diagnosticoid)
            ->orderBy('d.id')
            ->getQuery()
            ->getOneOrNullResult();
    }

}