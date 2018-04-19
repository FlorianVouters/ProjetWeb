<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function getUserByID($id){

        $repository = $this->getDoctrine()->getRepository(User::class);
        $compte = $repository->find($id);
        return $compte;

    }
    public function getUserByEmail($adresseMail){

        $repository = $this->getDoctrine()->getRepository(User::class);
        $compte = $repository->findBy([
            'adresseMail' => $adresseMail
        ]);
        return $compte;
    }

    public function getAllRegistrationsToActivity($compte_id){

        $repository = $this->getDoctrine()->getRepository(Registration::class);
        $inscription = $repository->findby([
            'compte_id' => $compte_id,
        ]);
        return $inscription;
    }
    public function getBasket($compte_id){
        $repository = $this->getDoctrine()->getRepository(Basket::class);
        $panier = $repository->findOneBy([
            'compte_id' => $compte_id,
        ]);
        return $panier;

    }
}