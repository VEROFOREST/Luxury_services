<?php

namespace App\Repository;

use App\Entity\Joboffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Joboffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joboffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joboffer[]    findAll()
 * @method Joboffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobofferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joboffer::class);
    }

    // /**
    //  * @return Joboffer[] Returns an array of Joboffer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Joboffer
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
