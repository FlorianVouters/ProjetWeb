<?php

namespace App\Repository;

use App\Entity\Reagit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Reagit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reagit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reagit[]    findAll()
 * @method Reagit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReagitRepository extends ServiceEntityRepository
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

    public function getReactionByCommentID($commentaire_id){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\Reagit::class);
        $reaction = $repository->find($commentaire_id);
        return $reaction;

    }
    public function addReactionToComment($commentaire_id, $reaction){
        $entityManager = $this->getDoctrine()->getManager();
        $reagit = new \App\Entity\Reagit();

        $reagit->setCommentaireId($commentaire_id);
        $reagit->setTypeVote($reaction);

        $entityManager->persist($reagit);
        $entityManager->flutch();
    }
    public function addReactionToActivity($activite_id, $reaction){
        $entityManager = $this->getDoctrine()->getManager();
        $reagit = new \App\Entity\Reagit();

        $reagit->setActiviteId($activite_id);
        $reagit->setTypeVote($reaction);

        $entityManager->persist($reagit);
        $entityManager->flutch();
    }
}
