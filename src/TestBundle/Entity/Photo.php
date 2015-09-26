<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="photos")
 * @ORM\HasLifecycleCallbacks
 */
class Photo extends EntityBase
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name = '';

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    protected $extension = '';

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="photos")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    protected $product;

    /**
     *
     * @var string path to image
     */
    protected $path;

    /**
     * @Assert\Image
     */
    public $attachment;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @ORM\PostLoad
     */
    public function postLoad()
    {
        $this->path =  "http:" . $_SERVER['SERVER_NAME'] . "/upload/{$this->id}.{$this->extension}";
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Photo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set product
     *
     * @param \TestBundle\Entity\Product $product
     *
     * @return Photo
     */
    public function setProduct(\TestBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \TestBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Photo
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
