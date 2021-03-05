<?php

namespace App\Repository;

use App\Entity\ProductShoes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductShoes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductShoes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductShoes[]    findAll()
 * @method ProductShoes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductShoesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductShoes::class);
    }

    // /**
    //  * @return ProductShoes[] Returns an array of ProductShoes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductShoes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
