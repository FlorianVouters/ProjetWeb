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
        $this->etatCommande=TRUE;
    }
    public function deleteBasket(){                                 //TODO : Vérifier le code ici
        $panier = $this->id;
        remove($panier);
        flush();
    }
}
