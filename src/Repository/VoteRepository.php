<?php

namespace App\Repository;

use App\Entity\Vote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vote[]    findAll()
 * @method Vote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vote::class);
    }

//    /**
//     * @return Vote[] Returns an array of Vote objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vote
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getVoteByIDActivity($activite_id){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\Vote::class);
        $vote = $repository->find($activite_id);
        return $vote;

    }

    public function addVoteToActivity($activity_id, $compte_id, $vote){
        $entityManager = $this->getDoctrine()->getManager();
        $voteActivite = new \App\Entity\Vote();

        $voteActivite->setActiviteId($activity_id);
        $voteActivite->setCompteId($compte_id);
        $voteActivite->setVote($vote);

        $entityManager->persist($voteActivite);
        $entityManager->flutch();
    }
    public function deleteVoteToActivity($activite_id, $compte_id){            //TODO: A vérifier
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(\App\Entity\Vote::class);
        $voteActivite = $repository->findby(
            ['activite_id' => $activite_id],
            ['compte_id' => $compte_id]
        );

        $entityManager->remove($voteActivite);
        $entityManager->flush();
    }

    public function getVoteByID($id){                       //TODO : Vérifier les clefs étrangères

        $repository = $this->getDoctrine()->getRepository(\App\Entity\Vote::class);
        $vote = $repository->find($id);
        return $vote ;
    }

}
