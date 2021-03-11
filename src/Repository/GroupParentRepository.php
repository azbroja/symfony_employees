<?php

namespace App\Repository;

use App\Entity\GroupParent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupParent|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupParent|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupParent[]    findAll()
 * @method GroupParent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupParentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupParent::class);
    }

    // /**
    //  * @return GroupParent[] Returns an array of GroupParent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupParent
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
