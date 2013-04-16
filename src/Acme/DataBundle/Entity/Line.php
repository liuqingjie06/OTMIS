<?php
/*
 *
* (c) liuqingjie06 <http://railmaps.org/>
*  线路表
* 创建日期 2013-4-16
*/

namespace Acme\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\DataBundle\Entity\Curve;

/**
 * @ORM\Entity
 * @ORM\Table(name="or_line")
 * 
 */

class Line
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
	 * @ORM\Column(name="name", type="string", length=128)
	 */
	private $name;
	
	/**
	 * @ORM\Column(name="number", type="string", length=128)
	 */
	private $number;
	
	/**
	 * use Doctrine\Common\Collections\ArrayCollection;
	 */
	/**
	 * @ORM\OneToMany(targetEntity="Acme\DataBundle\Entity\Curve", mappedBy="or_line")
	 */
	protected $curve;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->curve = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     * @return Line
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
     * Add curve
     *
     * @param Acme\DataBundle\Entity\Curve $curve
     * @return Line
     */
    public function addCurve(\Acme\DataBundle\Entity\Curve $curve)
    {
        $this->curve[] = $curve;
    
        return $this;
    }

    /**
     * Remove curve
     *
     * @param Acme\DataBundle\Entity\Curve $curve
     */
    public function removeCurve(\Acme\DataBundle\Entity\Curve $curve)
    {
        $this->curve->removeElement($curve);
    }

    /**
     * Get curve
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCurve()
    {
        return $this->curve;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Line
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }
}