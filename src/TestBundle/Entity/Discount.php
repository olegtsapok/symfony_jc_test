<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="discounts")
 */
class Discount extends EntityBase
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $amount;

    /**
     * @ORM\Column(name="quantity_products", type="integer")
     */
    protected $quantityProducts;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="discounts")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     **/
    protected $product;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Discount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set quantityProducts
     *
     * @param integer $quantityProducts
     *
     * @return Discount
     */
    public function setQuantityProducts($quantityProducts)
    {
        $this->quantityProducts = $quantityProducts;

        return $this;
    }

    /**
     * Get quantityProducts
     *
     * @return integer
     */
    public function getQuantityProducts()
    {
        return $this->quantityProducts;
    }

    /**
     * Set product
     *
     * @param \TestBundle\Entity\Product $product
     *
     * @return Discount
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
}
