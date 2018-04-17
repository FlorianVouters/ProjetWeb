<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TokenApiRepository")
 */
class TokenApi
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
    private $token;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $permission;


    /**
     * @OneToOne(targetEntity="Compte")
     * @JoinColumn(name="$compte_id", referencedColumnName="id")
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

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getPermission()
    {
        return $this->permission;
    }

    public function setPermission($permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    public function addTokenAPI($string, $compte_id){                //TODO: résoudre le problème de $compte_id
        $tokenApi = new TokenApi();
        $tokenApi = $this->setToken($string);
        $tokenApi = $this->setPermission(['Basic']);
        flush();
    }
}
