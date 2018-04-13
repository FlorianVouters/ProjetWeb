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
}
