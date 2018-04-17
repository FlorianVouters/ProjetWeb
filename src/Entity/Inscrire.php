<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscrireRepository")
 */
class Inscrire
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
    private $typeInscription;

    /**
     * @OneToOne(targetEntity="Compte")
     * @JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $compte_id;

    /**
     * @OneToOne(targetEntity="Activite")
     * @JoinColumn(name="activite_id", referencedColumnName="id")
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

    public function getTypeInscription(): ?bool
    {
        return $this->typeInscription;
    }

    public function setTypeInscription(?bool $typeInscription): self
    {
        $this->typeInscription = $typeInscription;

        return $this;
    }
}
