<?php

namespace App\Repository;

use App\Entity\Quantites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quantites>
 *
 * @method Quantites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quantites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quantites[]    findAll()
 * @method Quantites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quantites::class);
    }

//    /**
//     * @return Quantites[] Returns an array of Quantites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Quantites
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
