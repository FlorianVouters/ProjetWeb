<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Comment
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="compte_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="Activity")
     * @ORM\JoinColumn(name="activite_id", referencedColumnName="id")
     */
    private $activity_id;

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * @param mixed $activity_id
     */
    public function setActivityId($activity_id): void
    {
        $this->activity_id = $activity_id;
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
