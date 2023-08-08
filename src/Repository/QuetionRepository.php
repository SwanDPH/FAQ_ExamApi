<?php

namespace App\Repository;

use App\Entity\Quetion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Quetion>
 *
 * @method Quetion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quetion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quetion[]    findAll()
 * @method Quetion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuetionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quetion::class);
    }

//    /**
//     * @return Quetion[] Returns an array of Quetion objects
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

//    public function findOneBySomeField($value): ?Quetion
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
