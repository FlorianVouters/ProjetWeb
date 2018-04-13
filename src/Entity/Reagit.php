<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReagitRepository")
 */
class Reagit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $typeVote;

    public function getId()
    {
        return $this->id;
    }

    public function getTypeVote()
    {
        return $this->typeVote;
    }

    public function setTypeVote($typeVote): self
    {
        $this->typeVote = $typeVote;

        return $this;
    }
}
