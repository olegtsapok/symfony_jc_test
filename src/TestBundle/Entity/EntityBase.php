<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Base class for any entity.
 * 
 * @author Oleg Tsapok
 * @copyright 2015
 */
class EntityBase
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Init base properties.
     */
    public function __construct()
    {
        $this->date_modified = new \DateTime();
        $this->date_entered  = new \DateTime();
    }

    /**
     * Get object property.
     **/
    public function get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        }
        return false;
    }
    
    /**
     * Set object property.
     **/
    public function set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    /**
     * Convert object to string.
     * @return string
     */
    public function __toString()
    {
        return (string)$this->id;
    }
    
    /**
     * Convert object to int.
     * @return int
     */
    public function __toInt()
    {
        return (int)$this->id;
    }
    
    
}

