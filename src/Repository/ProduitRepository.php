<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Produit::class);
    }

//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function setProduct($nom, $description, $prix, $categorie){
        $entityManager = $this->getDoctrine()->getManager();
        $produit = new \App\Entity\Produit();

        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix($prix);
        $produit->setCategorie($categorie);
        $produit->setNombreVente('0');

        $entityManager->persist($produit);
        $entityManager->flutch();
    }

    public function getProduct($id){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\Produit::class);
        $produit = $repository->find($id);
        return $produit ;
    }

    public function addProduct($nom, $description, $prix, $categorie){ //Suppression de "$nombreVente" car non besoin

        $entityManager = $this->getDoctrine()->getManager();
        $activity = new \App\Entity\Produit();

        $activity->setNom($nom);
        $activity->setDescription($description);
        $activity->setPrix($prix);
        $activity->setCategorie($categorie);
        $activity->setNombreVente( 0);
        $entityManager->persist($activity);
        $entityManager->flutch();
    }


}
