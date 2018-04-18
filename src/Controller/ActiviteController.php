<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActiviteController extends Controller
{
    public function getActivityByID($id){

        $repository = $this->getDoctrine()->getRepository(Activite::class);
        $activite = $repository->find($id);
        return $activite;
    }
    public function getActivityByVisibility($etatVisibilite){

        $repository = $this->getDoctrine()->getRepository(Activite::class);
        $activite = $repository->findBy([
            'etatVisibilite' => $etatVisibilite
        ]);
        return $activite;
    }

    public function addActivity($nom, $description, $image){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activite();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate(null);
        $activity->setRecurrence(null);
        $activity->setPrix( null);
        $activity->setEtatVisibilite( true);
        $activity->setStatut( false);
        $entityManager->persist($activity);
        $entityManager->flush();
    }
    public function setActivity($nom, $description, $image, $date, $recurrence, $prix, $visibility, $statut){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activite();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate($date);
        $activity->setRecurrence($recurrence);
        $activity->setPrix( $prix);
        $activity->setEtatVisibilite( $visibility);
        $activity->setStatut( $statut);
        $entityManager->persist($activity);
        $entityManager->flush();
    }
}