<?php
// /src/Entity/User.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="User")
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

    /**
     * Retour le salt qui a servi à coder le mot de passe
     *
     * {@inheritdoc}
     */
    public function getSalt(): ?string
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // Nous n'avons pas besoin de cette methode car nous n'utilions pas de plainPassword
        // Mais elle est obligatoire car comprise dans l'interface UserInterface
        // $this->plainPassword = null;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->username, $this->password]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
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
