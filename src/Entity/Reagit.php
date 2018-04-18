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

    /**
     * @ManyToOne(targetEntity="Compte")
     * @JoinColumn(name="$compte_id", referencedColumnName="id")
     */
    private $compte_id;

    /**
     * @ManyToOne(targetEntity="Commentaire")
     * @JoinColumn(name="$commentaire_id", referencedColumnName="id")
     */
    private $commentaire_id;

    /**
     * @ManyToOne(targetEntity="Activite")
     * @JoinColumn(name="$activite_id", referencedColumnName="id")
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
    public function getCommentaireId()
    {
        return $this->commentaire_id;
    }

    /**
     * @param mixed $commentaire_id
     */
    public function setCommentaireId($commentaire_id): void
    {
        $this->commentaire_id = $commentaire_id;
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
