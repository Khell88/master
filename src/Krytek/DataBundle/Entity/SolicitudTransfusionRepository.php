<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 8/2/2017
 * Time: 09:14
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;

class SolicitudTransfusionRepository extends EntityRepository
{
    public function findFiveUnprocessed($estado, $max_result)
    {
        return $this->createQueryBuilder('st')
            ->where('st.estado = :estado')
            ->setParameter('estado', $estado)
            ->orderBy('st.fecha')
            ->addOrderBy('st.fechaARealizar')
            ->setMaxResults($max_result)
            ->getQuery()
            ->getResult();

    }

}