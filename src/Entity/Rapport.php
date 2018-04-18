<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RapportRepository")
 */
class Rapport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $raison;

    /**
     * @ORM\OneToMany(targetEntity="Compte")
     * @ORM\JoinColumn(name="$compte_id", referencedColumnName="id")
     */
    private $compte_id;


    /**
     * @ORM\ManyToOne(targetEntity="Commentaire")
     * @ORM\JoinColumn(name="commentaire_id", referencedColumnName="id")
     */
    private $commentaire_id;

    /**
     * @ORM\ManyToOne(targetEntity="Activite")
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

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): self
    {
        $this->raison = $raison;

        return $this;
    }


}
