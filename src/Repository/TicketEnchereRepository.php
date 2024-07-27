<?php

namespace App\Repository;

use App\Entity\TicketEnchere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TicketEnchere>
 *
 * @method TicketEnchere|null find($id, $lockMode = null, $lockVersion = null)
 * @method TicketEnchere|null findOneBy(array $criteria, array $orderBy = null)
 * @method TicketEnchere[]    findAll()
 * @method TicketEnchere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketEnchereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TicketEnchere::class);
    }

//    /**
//     * @return TicketEnchere[] Returns an array of TicketEnchere objects
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

//    public function findOneBySomeField($value): ?TicketEnchere
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
