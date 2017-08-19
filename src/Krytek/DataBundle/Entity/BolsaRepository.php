<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 8/15/2017
 * Time: 17:54
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;

class BolsaRepository extends EntityRepository
{
    public function findByNumber($codigo, $max_result){
        
        return $this->createQueryBuilder('b')
            ->where('b.codigo like :codigo')
            ->setParameter('codigo', "%".$codigo."%")
            ->orderBy('b.codigo')
            ->setMaxResults($max_result)
            ->getQuery()
            ->getResult();
    }

}