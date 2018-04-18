<?php

namespace App\Repository;

use App\Entity\Reagit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method Reagit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reagit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reagit[]    findAll()
 * @method Reagit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReagitRepository extends EntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Reagit::class);
    }

//    /**
//     * @return Reagit[] Returns an array of Reagit objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reagit
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


}
