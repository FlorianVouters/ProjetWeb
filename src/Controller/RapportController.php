<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:56
 */

namespace App\Controller;
use App\Entity\Rapport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RapportController extends Controller
{
    public function addReport($raison, $compte_id){
        $entityManager = $this->getDoctrine()->getManager();
        $rapport = new Rapport();

        $rapport->setRaison($raison);
        $rapport->setCompteId($compte_id);
        $entityManager->persist($rapport);
        $entityManager->flush();
    }
}