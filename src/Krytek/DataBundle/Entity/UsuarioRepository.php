<?php
/**
 * Created by PhpStorm.
 * User: NOS
 * Date: 3/19/2017
 * Time: 14:11
 */

namespace Krytek\DataBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UsuarioRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($nombreUsuario)
    {
        return $this->createQueryBuilder('u')
            ->where('u.nombreUsuario = :nombreUsuario')
            ->setParameter('nombreUsuario', $nombreUsuario)
            ->getQuery()
            ->getOneOrNullResult();
    }

}