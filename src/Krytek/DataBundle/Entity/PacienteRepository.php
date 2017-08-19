<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 4/27/2017
 * Time: 22:01
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;

class PacienteRepository extends EntityRepository
{
    public function findByCI($codigo, $max_result){

        return $this->createQueryBuilder('p')
            ->where('STR(p.ciPaciente) like :ci')
            ->setParameter('ci', "%".$codigo."%")
            ->orderBy('p.ciPaciente')
            ->setMaxResults($max_result)
            ->getQuery()
            ->getResult();
    }

    public function findByNameOrLastName($name, $max_result){

        return $this->createQueryBuilder('p')
            ->where('UPPER(p.nombre) like :name')
            ->orWhere('UPPER (p.apellidos) like :name')
            ->setParameter('name', "%".$name."%")
            ->orderBy('p.ciPaciente')
            ->setMaxResults($max_result)
            ->getQuery()
            ->getResult();
    }

}