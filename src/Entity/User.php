<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email", message="Email déjà utilisé")
 */
class User implements UserInterface, \Serializable
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $token_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reset_token;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $reset_token_at;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getTokenAt(): ?\DateTimeImmutable
    {
        return $this->token_at;
    }

    public function setTokenAt(?\DateTimeImmutable $token_at): self
    {
        $this->token_at = $token_at;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    public function setResetToken(?string $reset_token): self
    {
        $this->reset_token = $reset_token;

        return $this;
    }

    public function getResetTokenAt(): ?\DateTimeImmutable
    {
        return $this->reset_token_at;
    }

    public function setResetTokenAt(?\DateTimeImmutable $reset_token_at): self
    {
        $this->reset_token_at = $reset_token_at;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;

        if(empty($roles)) $roles[]= 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles($roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        //Not needed
    }

    public function serialize()
    {
        return $this->serialize([$this->id, $this->username, $this->password]);
    }

    public function unserialize($serialized)
    {
        [$this->id, $this->username, $this->password] = $this->unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getFullName(): ?string
    {
        return $this->firstname.' '.$this->surname;
    }

    public function setFullName($fullName): self
    {
        $fullName = explode(' ', $fullName);
        $this->firstname = $fullName[0];
        $this->surname = $fullName[1];

        return $this;
    }
}
