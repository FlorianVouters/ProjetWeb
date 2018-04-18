<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function setProduct($nom, $description, $prix, $categorie){
        $entityManager = $this->getDoctrine()->getManager();
        $produit = new Product();

        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix($prix);
        $produit->setCategorieId($categorie);
        $produit->setNombreVente('0');

        $entityManager->persist($produit);
        $entityManager->flush();
    }

    public function getProduct($id){

        $repository = $this->getDoctrine()->getRepository(Product::class);
        $produit = $repository->find($id);
        return $produit ;
    }

    public function addProduct($nom, $description, $prix, $categorie){ //Suppression de "$nombreVente" car non besoin

        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Product();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setPrix($prix);
        $activity->setCategorieId($categorie);
        $activity->setNombreVente( 0);
        $entityManager->persist($activity);
        $entityManager->flush();
    }


}