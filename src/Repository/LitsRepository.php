<?php

namespace App\Repository;

use App\Entity\Lits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lits[]    findAll()
 * @method Lits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lits::class);
    }

    // /**
    //  * @return Lits[] Returns an array of Lits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lits
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
