<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Product
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
    private $name;
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="integer")
     */
    private $price;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;
    /**
     * @ORM\Column(type="integer")
     */
    private $sells;
    /**
     * @OneToOne(targetEntity="Panier")
     * @JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $idBasket;
    /**
     * @return mixed
     */
    public function getIdBasket()
    {
        return $this->idBasket;
    }
    /**
     * @param mixed $idBasket
     */
    public function setIdBasket($idBasket): void
    {
        $this->idBasket = $idBasket;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
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
    public function getPrice(): ?int
    {
        return $this->price;
    }
    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }
    public function getCategory(): ?string
    {
        return $this->category;
    }
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }
    public function getSells(): ?int
    {
        return $this->sells;
    }
    public function setSells(int $sells): self
    {
        $this->sells = $sells;
        return $this;
    }
//    public function deleteProduct(){
//        $produit = $this->id;
//        remove($produit);
//        flush();
//    }
//    public function productSold(){
//        $this->sells = $this->sells+1;
//    }
}