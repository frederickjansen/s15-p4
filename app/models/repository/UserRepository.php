<?php

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUserByEmail($email)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.id, u.email')
            ->where('u.email = :email')
            ->setParameter('email', $email);

        return $qb->getQuery()->getResult();
    }
}