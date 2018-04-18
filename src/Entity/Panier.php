<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreArticle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etatCommande;

    /**
     * @OneToOne(targetEntity="Compte")
     * @JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $compte_id;

    /**
     * @ManyToOne(targetEntity="Produit")
     * @JoinColumn(name="$produit_id", referencedColumnName="id")
     */
    private $produit_id;

    /**
     * @return mixed
     */
    public function getProduitId()
    {
        return $this->produit_id;
    }

    /**
     * @param mixed $produit_id
     */
    public function setProduitId($produit_id): void
    {
        $this->produit_id = $produit_id;
    }

    /**
     * @return mixed
     */
    public function getCompteId()
    {
        return $this->compte_id;
    }

    /**
     * @param mixed $compte_id
     */
    public function setCompteId($compte_id): void
    {
        $this->compte_id = $compte_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombreArticle(): ?int
    {
        return $this->nombreArticle;
    }

    public function setNombreArticle(?int $nombreArticle): self
    {
        $this->nombreArticle = $nombreArticle;

        return $this;
    }

    public function getEtatCommande(): ?bool
    {
        return $this->etatCommande;
    }

    public function setEtatCommande(bool $etatCommande): self
    {
        $this->etatCommande = $etatCommande;

        return $this;
    }

    public function basketSold(){
        $entityManager = $this->getDoctrine()->getManager();            // TODO: A vérifier
        $panier = $this->etatCommande=TRUE;
        $entityManager->persist($panier);
        $entityManager->flush();

    }
    public function deleteBasket(){                                 //TODO : Vérifier le code ici
        $entityManager = $this->getDoctrine()->getManager();
        $panier = $this->id;
        $entityManager->remove($panier);
        $entityManager->flush();
    }
}
