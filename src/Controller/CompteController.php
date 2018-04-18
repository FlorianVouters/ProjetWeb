<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Compte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompteController extends Controller
{
    public function getUserByID($id){               // Changement fait ici.

        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $compte = $repository->find($id);
        return $compte;

    }
    public function getUserByEmail($adresseMail){

        $repository = $this->getDoctrine()->getRepository(Compte::class);
        $compte = $repository->findBy([
            'adresseMail' => $adresseMail
        ]);
        return $compte;
    }

}