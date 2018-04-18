<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit extends Controller
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
     * @ORM\Column(type="integer")
     */
    private $nombreVente;

    /**
     * @ORM\OneToOne(targetEntity="Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="$categorie_id", referencedColumnName="id")
     */
    private $categorie_id;



    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie_id;
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id): void
    {
        $this->categorie_id = $categorie_id;
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



