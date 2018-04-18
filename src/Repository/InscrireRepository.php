<?php

namespace App\Repository;

use App\Entity\Inscrire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Inscrire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscrire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscrire[]    findAll()
 * @method Inscrire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscrireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Inscrire::class);
    }

//    /**
//     * @return Inscrire[] Returns an array of Inscrire objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Inscrire
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function addRegisterToActivity($compte_id, $activite_id, $typeInscription){
        $entityManager = $this->getDoctrine()->getManager();
        $inscrire = new \App\Entity\Inscrire();

        $inscrire->setCompteId($compte_id);
        $inscrire->setActiviteId($activite_id);
        $inscrire->setTypeInscription($typeInscription);

        $entityManager->persist($inscrire);
        $entityManager->flutch();
    }


}
