<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActivityController extends Controller
{
    public function getActivityByID($id){

        $repository = $this->getDoctrine()->getRepository(Activity::class);
        $activite = $repository->find($id);
        return $activite;
    }
    public function getActivityByVisibility($etatVisibilite){

        $repository = $this->getDoctrine()->getRepository(Activity::class);
        $activite = $repository->findBy([
            'etatVisibilite' => $etatVisibilite
        ]);
        return $activite;
    }

    public function addActivity($nom, $description, $image){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activity();

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate(null);
        $activity->setCurrency(null);
        $activity->setPrice( null);
        $activity->setVisibility( true);
        $activity->setStatut( false);
        $entityManager->persist($activity);
        $entityManager->flush();
    }
    public function setActivity($nom, $description, $image, $date, $recurrence, $prix, $visibility, $statut){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activity();

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate($date);
        $activity->setCurrency($recurrence);
        $activity->setPrice( $prix);
        $activity->setVisibility( $visibility);
        $activity->setStatut( $statut);
        $entityManager->persist($activity);
        $entityManager->flush();
    }
}