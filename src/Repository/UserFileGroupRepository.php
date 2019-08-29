<?php

namespace App\Repository;

use App\Entity\UserFileGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserFileGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserFileGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserFileGroup[]    findAll()
 * @method UserFileGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserFileGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserFileGroup::class);
    }

    // /**
    //  * @return UserFileGroup[] Returns an array of UserFileGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserFileGroup
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
