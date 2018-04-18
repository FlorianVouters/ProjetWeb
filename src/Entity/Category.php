<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Media;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=125)
     */
    private $name;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set nom
     *
     * @param string $name
     * @return Categories
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get nom
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set image
     *
     * @param Media $image
     * @return Categories
     */
    public function setImage(Media $image)
    {
        $this->image = $image;
        return $this;
    }
    /**
     * Get image
     *
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }
}
