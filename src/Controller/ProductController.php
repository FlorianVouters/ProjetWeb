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

        $produit->setName($nom);
        $produit->setDescription($description);
        $produit->setPrice($prix);
        $produit->setCategoryId($categorie);
        $produit->setSold('0');

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

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setPrice($prix);
        $activity->setCategoryId($categorie);
        $activity->setSold( 0);
        $entityManager->persist($activity);
        $entityManager->flush();
    }

    public function deleteProduct($product_id){
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $entityManager = $this->getDoctrine()->getManager();

        $produit = $repository->findOneBy([
            'product_id' => $product_id,
        ]);
        $entityManager->remove($produit);
        $entityManager->flush();
    }

    public function productSold($product_id){
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $entityManager = $this->getDoctrine()->getManager();

        $produit = $repository->findOneBy([
            'product_id' => $product_id,
        ]);
        $produit->nombreVente = $produit->nombreVente =1;
        $entityManager->persist($produit);
        $entityManager->flush();
    }

}