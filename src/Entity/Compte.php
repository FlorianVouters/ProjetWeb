<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
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



    //registerTo($idActivity);
    //voteTo($idActivity, $vote);
    //getAllRegistrationsToActivity();
    public function getBasket(){                                //TODO: flush()
        $query = Doctrine_Query::create()
        ->select( 'Panier.nombreArticle, Panier.idProduit' )
        ->from( 'Panier' )
        ->where( 'id =', $this->id )
        ->flush();

    }

    public function addUser($nom, $prenom, $adresseMail, $password){
        $compte = new Compte();

        $compte = setNom($nom);
        $compte = setPrenom($prenom);
        $compte = setAdresseMail($adresseMail);
        $compte = setPassword($password);
        $compte.save();
    }

    public function getUserByID($id){
        $query = Doctrine_Query::create()
        ->select('Compte.nom, Compte.prenom, Compte.adresseMail, Compte.password, Compte.token')
        ->from('Compte')
        ->where('id =', $this->id)
        ->flush();
    }


}

