<?php

namespace App\Repository;

use App\Entity\Colaborateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Colaborateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Colaborateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Colaborateur[]    findAll()
 * @method Colaborateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColaborateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Colaborateur::class);
    }

    // /**
    //  * @return Colaborateur[] Returns an array of Colaborateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Colaborateur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
