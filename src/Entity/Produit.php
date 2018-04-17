<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreVente;

    /**
     * @OneToOne(targetEntity="Panier")
     * @JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $panier_id;

    /**
     * @return mixed
     */
    public function getPanierId()
    {
        return $this->panier_id;
    }

    /**
     * @param mixed $panier_id
     */
    public function setPanierId($panier_id): void
    {
        $this->panier_id = $panier_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNombreVente(): ?int
    {
        return $this->nombreVente;
    }

    public function setNombreVente(int $nombreVente): self
    {
        $this->nombreVente = $nombreVente;

        return $this;
    }

    public function deleteProduct(){
        $entityManager = $this->getDoctrine()->getManager();
        $produit = $this->id;
        $entityManager->remove($produit);
        $entityManager->flush();
    }

    public function productSold(){
        $this->nombreVente = $this->nombreVente+1;
    }

}



