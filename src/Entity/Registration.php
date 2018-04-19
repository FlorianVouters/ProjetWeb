<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscrireRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $registrationType;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $compte_id;

    /**
     * @ORM\ManyToOne(targetEntity="Activity")
     * @ORM\JoinColumn(name="activite_id", referencedColumnName="id")
     */
    private $activite_id;

    /**
     * @return mixed
     */
    public function getActiviteId()
    {
        return $this->activite_id;
    }

    /**
     * @param mixed $activite_id
     */
    public function setActiviteId($activite_id): void
    {
        $this->activite_id = $activite_id;
    }

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

    public function getRegistrationType(): ?bool
    {
        return $this->registrationType;
    }

    public function setRegistrationType(?bool $registrationType): self
    {
        $this->registrationType = $registrationType;

        return $this;
    }
}
