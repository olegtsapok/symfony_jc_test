<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product extends EntityBase
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name = '';

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
     * @ORM\JoinTable(name="products_categories_crossref",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     **/
    protected $categories;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="product")
     **/
    protected $photos;

    /**
     * @ORM\OneToMany(targetEntity="Discount", mappedBy="product")
     **/
    protected $discounts;

    public function __construct()
    {
        parent::__construct();

        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->discounts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Add category
     *
     * @param \TestBundle\Entity\Category $category
     *
     * @return Product
     */
    public function addCategory(\TestBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \TestBundle\Entity\Category $category
     */
    public function removeCategory(\TestBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add photo
     *
     * @param \TestBundle\Entity\Photo $photo
     *
     * @return Product
     */
    public function addPhoto(\TestBundle\Entity\Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \TestBundle\Entity\Photo $photo
     */
    public function removePhoto(\TestBundle\Entity\Photo $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add discount
     *
     * @param \TestBundle\Entity\Discount $discount
     *
     * @return Product
     */
    public function addDiscount(\TestBundle\Entity\Discount $discount)
    {
        $this->discounts[] = $discount;

        return $this;
    }

    /**
     * Remove discount
     *
     * @param \TestBundle\Entity\Discount $discount
     */
    public function removeDiscount(\TestBundle\Entity\Discount $discount)
    {
        $this->discounts->removeElement($discount);
    }

    /**
     * Get discounts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }
}
