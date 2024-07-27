<?php

namespace App\Repository;

use App\Entity\Ticketp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ticketp>
 *
 * @method Ticketp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticketp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticketp[]    findAll()
 * @method Ticketp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticketp::class);
    }

//    /**
//     * @return Ticketp[] Returns an array of Ticketp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ticketp
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
