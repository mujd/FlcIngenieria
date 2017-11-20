<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ImageRepository")
 */
class Image {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="image",type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;
    // ...
    
    /**
     * @ORM\ManyToOne(targetEntity="Obra", inversedBy="image")
     */
    private $obra;

    protected $obraImage;

    public function __construct() {
        $this->obra = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Image
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    public function getObraImage() {
        return $this->obraImage;
    }
    
    /**
     * Add image
     *
     * @param RoomImage $image
     *
     * @return Room
     */
    public function addImage(RoomImage $image)
    {
        $image->setRoom($this);
        $this->images[] = $image;

        dump($image);

        return $this;
    }

    /**
     * Remove image
     *
     * @param RoomImage $image
     */
    public function removeImage(RoomImage $image)
    {
        $image->setRoom(null);
        $this->images->removeElement($image);
    }
    
    public function setObra(Obra $obra)
    {
        $this->obra = $obra;
    }

    public function getObra()
    {
        return $this->obra;
    }
    

    public function __toString() {
        return $this->getName();
    }

}
