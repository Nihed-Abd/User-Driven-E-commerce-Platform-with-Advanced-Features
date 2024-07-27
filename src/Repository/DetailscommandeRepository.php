<?php

namespace App\Repository;

use App\Entity\Detailscommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Detailscommande>
 *
 * @method Detailscommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Detailscommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Detailscommande[]    findAll()
 * @method Detailscommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailscommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detailscommande::class);
    }

//    /**
//     * @return Detailscommande[] Returns an array of Detailscommande objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Detailscommande
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
