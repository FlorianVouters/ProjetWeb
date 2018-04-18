<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:56
 */

namespace App\Controller;
use App\Entity\Report;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportController extends Controller
{
    public function addReport($raison, $compte_id){
        $entityManager = $this->getDoctrine()->getManager();
        $rapport = new Report();

        $rapport->setRaison($raison);
        $rapport->setCompteId($compte_id);
        $entityManager->persist($rapport);
        $entityManager->flush();
    }
}