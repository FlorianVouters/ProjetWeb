<?php

namespace App\Repository;

use App\Entity\Activite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Activite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activite[]    findAll()
 * @method Activite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiviteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Activite::class);
    }

//    /**
//     * @return Activite[] Returns an array of Activite objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Activite
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getActivityByID($id){

        $repository = $this->getRepository(\App\Entity\Activite::class);
        $activite = $repository->find($id);
        return $activite;
    }
    public function getActivityByVisibility($etatVisibilite){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\Activite::class);
        $activite = $repository->find($etatVisibilite);
        return $activite;
    }

    public function addActivity($nom, $description, $image){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new \App\Entity\Activite();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate(null);
        $activity->setRecurrence(null);
        $activity->setPrix( null);
        $activity->setEtatVisibilite( true);
        $activity->setStatut( false);
        $entityManager->persist($activity);
        $entityManager->flutch();
    }
    public function setActivity($nom, $description, $image, $date, $recurrence, $prix, $visibility, $statut){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new \App\Entity\Activite();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate($date);
        $activity->setRecurrence($recurrence);
        $activity->setPrix( $prix);
        $activity->setEtatVisibilite( $visibility);
        $activity->setStatut( $statut);
        $entityManager->persist($activity);
        $entityManager->flutch();
    }

}
