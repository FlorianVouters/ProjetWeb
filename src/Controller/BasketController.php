<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Basket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BasketController extends Controller
{
    public function basketSold($user_id){
        $repository = $this->getDoctrine()->getRepository(Basket::class);
        $entityManager = $this->getDoctrine()->getManager();

        $panier = $repository->findOneBy([
        'user_id' => $user_id,
            ]);
        $panier->setEtatCommande(true);
        $entityManager->persist($panier);
        $entityManager->flush();
    }


    public function deleteBasket($user_id){
        $repository = $this->getDoctrine()->getRepository(Basket::class);
        $entityManager = $this->getDoctrine()->getManager();

        $panier = $repository->findOneBy([
            'user_id' => $user_id,
        ]);
        $entityManager->remove($panier);
        $entityManager->flush();
    }

    public function addToBasket($product_id, $user_id){
        $repository = $this->getDoctrine()->getRepository(Basket::class);

        $basket = $repository->findOneBy([
            'user_id' => $user_id,
        ]);
        if ($basket == null){
            $entityManager = $this->getDoctrine()->getManager();
            $newBasket = new Basket();
            $newBasket->setUserId($user_id);
            $newBasket->setProductId($product_id);
            $entityManager->persist($newBasket);
            $entityManager->flush();

        }
        else {
            $entityManager = $this->getDoctrine()->getManager();
            $basket->setProductId($product_id);
            $entityManager->persist($basket);
            $entityManager->flush();
        }
    }
}