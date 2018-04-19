<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BasketRepository")
 */
class Basket
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
    private $amout;

    /**
     * @ORM\Column(type="boolean")
     */
    private $orderState;

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="basket")
     * @ORM\JoinColumn(name="produit_id", referencedColumnName="id")
     */
    private $product_id;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmout(): ?int
    {
        return $this->amout;
    }

    public function setAmout(?int $amout): self
    {
        $this->amout = $amout;

        return $this;
    }

    public function getOrderState(): ?bool
    {
        return $this->orderState;
    }

    public function setOrderState(bool $orderState): self
    {
        $this->orderState = $orderState;

        return $this;
    }

    public function basketSold(){
        $entityManager = $this->getDoctrine()->getManager();            // TODO: A vérifier
        $panier = $this->orderState=TRUE;
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
