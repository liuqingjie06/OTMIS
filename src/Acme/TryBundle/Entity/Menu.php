<?php

namespace Acme\TryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TryBundle\Entity\Menu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected $name;
    
    /**
     * @ORM\Column(name="class", type="string", length=20)
     */
    protected $class;
    
    /**
     * @ORM\Column(name="fatherid",type="integer")
     */
    protected $fatherid;
    
    /**
     * @ORM\Column(name="hassonid",type="integer", length=4)
     */
    protected $hasson;
    
    
    

    /**
     * Set name
     *
     * @param string $name
     * @return Menu
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
     * Set fatherid
     *
     * @param integer $fatherid
     * @return Menu
     */
    public function setFatherid($fatherid)
    {
        $this->fatherid = $fatherid;
    
        return $this;
    }

    /**
     * Get fatherid
     *
     * @return integer 
     */
    public function getFatherid()
    {
        return $this->fatherid;
    }



    /**
     * Set hasson
     *
     * @param bool $hasson
     * @return Menu
     */
    public function setHasson(\bool $hasson)
    {
        $this->hasson = $hasson;
    
        return $this;
    }

    /**
     * Get hasson
     *
     * @return bool 
     */
    public function getHasson()
    {
        return $this->hasson;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Menu
     */
    public function setClass($class)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }
}