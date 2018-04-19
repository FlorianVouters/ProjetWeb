<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:56
 */

namespace App\Controller;

use App\Entity\TokenApi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TokenApiController extends Controller
{

    public function addTokenAPI($string, $compte_id){
        $entityManager = $this->getDoctrine()->getManager();
        $tokenApi = new TokenApi();

        $tokenApi->setToken($string);
        $tokenApi->setPermission(['Basic']);
        $tokenApi->setCompteId($compte_id);
        $entityManager->persist($tokenApi);
        $entityManager->flush();
    }

    public function getTokenbyToken($token){

        $repository = $this->getDoctrine()->getRepository(TokenApi::class);
        $token = $repository->findOneBy([
            'token' => $token
        ]);
        return $token;
    }


}