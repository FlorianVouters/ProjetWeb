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
