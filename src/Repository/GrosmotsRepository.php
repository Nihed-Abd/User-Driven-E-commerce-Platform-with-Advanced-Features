<?php

namespace App\Repository;

use App\Entity\Grosmots;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Grosmots>
 *
 * @method Grosmots|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grosmots|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grosmots[]    findAll()
 * @method Grosmots[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrosmotsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grosmots::class);
    }

//    /**
//     * @return Grosmots[] Returns an array of Grosmots objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Grosmots
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
