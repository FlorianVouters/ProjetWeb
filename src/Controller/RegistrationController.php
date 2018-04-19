<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Registration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationController extends Controller
{
    public function addRegisterToActivity($compte_id, $activite_id, $typeInscription){
        $entityManager = $this->getDoctrine()->getManager();
        $inscrire = new Registration();

        $inscrire->setCompteId($compte_id);
        $inscrire->setActiviteId($activite_id);
        $inscrire->setTypeInscription($typeInscription);

        $entityManager->persist($inscrire);
        $entityManager->flush();
    }
    public function getPeopleRegisteredToActivity($activite_id){
        $repository = $this->getDoctrine()->getRepository(Registration::class);
        $register = $repository->findBy([
            '$activite_id' => $activite_id
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