<?php

namespace App\Controller;

use App\Entity\Registration;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationActivityController extends Controller
{

    public function addRegisterToActivity($compte_id, $activite_id, $typeInscription){
        $entityManager = $this->getDoctrine()->getManager();
        $inscrire = new Registration();

        $inscrire->setUserId($compte_id);
        $inscrire->setActivityId($activite_id);
        $inscrire->setRegistrationType($typeInscription);

        $entityManager->persist($inscrire);
        $entityManager->flush();
    }
    public function getPeopleRegisteredToActivity($activity_id){
        $repository = $this->getDoctrine()->getRepository(Registration::class);
        $register = $repository->findBy([
            '$activity_id' => $activity_id
        ]);
        return $register; //   /!\ ça retourne un tableau
    }

    public function deleteRegisterToActivity($register_id){
        $repository = $this->getDoctrine()->getRepository(Registration::class);
        $entityManager = $this->getDoctrine()->getManager();

        $register = $repository->findOneBy([
            'register_id' => $register_id,
        ]);
        $entityManager->remove($register);
        $entityManager->flush();
    }
}
