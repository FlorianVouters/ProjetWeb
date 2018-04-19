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
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="$compte_id", referencedColumnName="id")
     */
    private $user_id;

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


}
