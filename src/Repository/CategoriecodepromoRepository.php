<?php

namespace App\Repository;

use App\Entity\Categoriecodepromo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categoriecodepromo>
 *
 * @method Categoriecodepromo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categoriecodepromo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categoriecodepromo[]    findAll()
 * @method Categoriecodepromo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriecodepromoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categoriecodepromo::class);
    }

//    /**
//     * @return Categoriecodepromo[] Returns an array of Categoriecodepromo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Categoriecodepromo
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
