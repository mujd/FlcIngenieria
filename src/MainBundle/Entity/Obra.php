<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use MainBundle\Entity\Image;

/**
 * Obra
 *
 * @ORM\Table(name="obra")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\ObraRepository")
 */
class Obra
{
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;
    
    /**
     * @var string
     *
     * @ORM\Column(name="superficie", type="string", length=255)
     */
    private $superficie;
    
    /**
     * @var date
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = false;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="obra")
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="obra")
     */
    private $images;
    

    public function __construct() {
        $this->images = new ArrayCollection();
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Obra
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Obra
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Set superficie
     *
     * @param string $superficie
     *
     * @return Obra
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return string
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }
    
    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    
    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Obra
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
    
    public function setImages(\MainBundle\Entity\Image $images)
    {
        $this->images = $images;
        return $this;
    }
    
    /**
     * Get image
     *
     * @return MainBundle\Entity\Image
     */
    public function getImages() {
        return $this->images;
    }
    
    public function __toString() {
        return $this->getTitle();
    }
}

