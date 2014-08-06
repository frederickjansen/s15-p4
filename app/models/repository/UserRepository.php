<?php

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getAllUsers()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.username')
            ->orderBy('u.id', "ASC");

        return $qb->getQuery()->getResult();
    }

    public function getUserLogin($username, $password)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.username')
            ->where('u.username = :username')
            ->andWhere('u.password = :password')
            ->setParameter('username', $username)
            ->setParameter('password', $password);

        return $qb->getQuery()
            ->getResult();
    }
}