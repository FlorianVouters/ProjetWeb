<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte extends Controller
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseMail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $statut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;


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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getValidite(): ?bool
    {
        return $this->validite;
    }

    public function setValidite(bool $validite): self
    {
        $this->validite = $validite;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }



    public function getAllRegistrationsToActivity(){

        $repository = $this->getDoctrine()->getRepository(Inscrire::class);
        $inscription = $repository->findby([
            'compte_id' => $this->id,
        ]);
        return $inscription;
    }
    public function getBasket(){
        $repository = $this->getDoctrine()->getRepository(Panier::class);
        $panier = $repository->findOneBy([
           'compte_id' => $this->id,
        ]);
        return $panier;

    }






}

