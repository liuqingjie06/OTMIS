<?php
/*
 *
* (c) liuqingjie06 <http://railmaps.org/>
*  曲线表
* 创建日期 2013-4-16
*/

namespace Acme\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="or_curve")
 * 
 */

class Curve
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
     * @ORM\ManyToOne(targetEntity="Acme\DataBundle\Entity\Line")
     * @ORM\JoinColumn(name="line_id", referencedColumnName="id")
     */
	private $line;
	
	/**
	 * @ORM\Column(name="side", type="smallint")
	 */
	private $side;
	
	/**
	 * @ORM\Column(name="workarea",type="integer")
	 */
	private $workarea;
	
	/**
	 * @ORM\Column(name="startmileage", type="float")
	 */
	private $startmileage;
	
	/**
	 * @ORM\Column(name="stopmileage", type="float")
	 * 
	 */
	private $stopmileage;
	
	/**
	 * @ORM\Column (name="radius", type="float")
	 */
	private $radius;
	
	/**
	 * @ORM\Column (name="direction",type="smallint")
	 * 
	 */
	private $directon;
	
	/**
	 * @ORM\Column (name="versine", type="float")
	 * 
	 */
	private $versine;
	
	/**
	 * @ORM\Column (name="angle", type="float",nullable=TRUE)
	 */
	private $angle;
	
	/**
	 * @ORM\Column (name="superelevation", type="float", nullable=TRUE)
	 */
	private $superelevation;
	
	/**
	 * @ORM\Column (name="widthen", type="float", nullable=TRUE)
	 */
	private $widthen;
	
	/**
	 * @ORM\Column (name="starttangent", type="float", nullable=TRUE)
	 */
	private $starttangent;
	
	/**
	 * @ORM\Column (name="stoptangent", type="float", nullable=TRUE)
	 */
	private $stoptangent;
	/**
	 * @ORM\Column (name="starttransition", type="float", nullable=TRUE)
	 */
	private $starttransition;
	
	/**
	 * @ORM\Column (name="stoptransition", type="float", nullable=TRUE)
	 */
	private $stoptransition;
	
	/**
	 * @ORM\Column (name="curvelength", type="float")
	 */
	private $curvelength;
	
	/**
	 * @ORM\Column (name="slope", type="float", nullable=TRUE)
	 * 
	 */
	private $slope;
	
	/**
	 * @ORM\Column (name="speed", type="float", nullable=TRUE)
	 */
	private $speed;
	
	/**
	 * @ORM\Column (name="identifier", type="string", length=128)
	 */
	private $identifier;
	
	/**
	 * @ORM\Column (name="hasoperation", type="boolean")
	 */
	private $hasoperation;
	
	/**
	 * @ORM\Column (name="remark", type="string",nullable=TRUE)
	 */
	private $remark;
	
	

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
     * Set side
     *
     * @param integer $side
     * @return Curve
     */
    public function setSide($side)
    {
        $this->side = $side;
    
        return $this;
    }

    /**
     * Get side
     *
     * @return integer 
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set workarea
     *
     * @param integer $workarea
     * @return Curve
     */
    public function setWorkarea($workarea)
    {
        $this->workarea = $workarea;
    
        return $this;
    }

    /**
     * Get workarea
     *
     * @return integer 
     */
    public function getWorkarea()
    {
        return $this->workarea;
    }

    /**
     * Set startmileage
     *
     * @param float $startmileage
     * @return Curve
     */
    public function setStartmileage(\float $startmileage)
    {
        $this->startmileage = $startmileage;
    
        return $this;
    }

    /**
     * Get startmileage
     *
     * @return float 
     */
    public function getStartmileage()
    {
        return $this->startmileage;
    }

    /**
     * Set stopmileage
     *
     * @param float $stopmileage
     * @return Curve
     */
    public function setStopmileage(\float $stopmileage)
    {
        $this->stopmileage = $stopmileage;
    
        return $this;
    }

    /**
     * Get stopmileage
     *
     * @return float 
     */
    public function getStopmileage()
    {
        return $this->stopmileage;
    }

    /**
     * Set radius
     *
     * @param float $radius
     * @return Curve
     */
    public function setRadius(\float $radius)
    {
        $this->radius = $radius;
    
        return $this;
    }

    /**
     * Get radius
     *
     * @return float 
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Set directon
     *
     * @param integer $directon
     * @return Curve
     */
    public function setDirecton($directon)
    {
        $this->directon = $directon;
    
        return $this;
    }

    /**
     * Get directon
     *
     * @return integer 
     */
    public function getDirecton()
    {
        return $this->directon;
    }

    /**
     * Set versine
     *
     * @param float $versine
     * @return Curve
     */
    public function setVersine(\float $versine)
    {
        $this->versine = $versine;
    
        return $this;
    }

    /**
     * Get versine
     *
     * @return float 
     */
    public function getVersine()
    {
        return $this->versine;
    }

    /**
     * Set angle
     *
     * @param float $angle
     * @return Curve
     */
    public function setAngle(\float $angle)
    {
        $this->angle = $angle;
    
        return $this;
    }

    /**
     * Get angle
     *
     * @return float 
     */
    public function getAngle()
    {
        return $this->angle;
    }

    /**
     * Set superelevation
     *
     * @param float $superelevation
     * @return Curve
     */
    public function setSuperelevation(\float $superelevation)
    {
        $this->superelevation = $superelevation;
    
        return $this;
    }

    /**
     * Get superelevation
     *
     * @return float 
     */
    public function getSuperelevation()
    {
        return $this->superelevation;
    }

    /**
     * Set widthen
     *
     * @param float $widthen
     * @return Curve
     */
    public function setWidthen(\float $widthen)
    {
        $this->widthen = $widthen;
    
        return $this;
    }

    /**
     * Get widthen
     *
     * @return float 
     */
    public function getWidthen()
    {
        return $this->widthen;
    }

    /**
     * Set starttangent
     *
     * @param float $starttangent
     * @return Curve
     */
    public function setStarttangent(\float $starttangent)
    {
        $this->starttangent = $starttangent;
    
        return $this;
    }

    /**
     * Get starttangent
     *
     * @return float 
     */
    public function getStarttangent()
    {
        return $this->starttangent;
    }

    /**
     * Set stoptangent
     *
     * @param float $stoptangent
     * @return Curve
     */
    public function setStoptangent(\float $stoptangent)
    {
        $this->stoptangent = $stoptangent;
    
        return $this;
    }

    /**
     * Get stoptangent
     *
     * @return float 
     */
    public function getStoptangent()
    {
        return $this->stoptangent;
    }

    /**
     * Set starttransition
     *
     * @param float $starttransition
     * @return Curve
     */
    public function setStarttransition(\float $starttransition)
    {
        $this->starttransition = $starttransition;
    
        return $this;
    }

    /**
     * Get starttransition
     *
     * @return float 
     */
    public function getStarttransition()
    {
        return $this->starttransition;
    }

    /**
     * Set stoptransition
     *
     * @param float $stoptransition
     * @return Curve
     */
    public function setStoptransition(\float $stoptransition)
    {
        $this->stoptransition = $stoptransition;
    
        return $this;
    }

    /**
     * Get stoptransition
     *
     * @return float 
     */
    public function getStoptransition()
    {
        return $this->stoptransition;
    }

    /**
     * Set curvelength
     *
     * @param float $curvelength
     * @return Curve
     */
    public function setCurvelength(\float $curvelength)
    {
        $this->curvelength = $curvelength;
    
        return $this;
    }

    /**
     * Get curvelength
     *
     * @return float 
     */
    public function getCurvelength()
    {
        return $this->curvelength;
    }

    /**
     * Set slope
     *
     * @param float $slope
     * @return Curve
     */
    public function setSlope(\float $slope)
    {
        $this->slope = $slope;
    
        return $this;
    }

    /**
     * Get slope
     *
     * @return float 
     */
    public function getSlope()
    {
        return $this->slope;
    }

    /**
     * Set speed
     *
     * @param float $speed
     * @return Curve
     */
    public function setSpeed(\float $speed)
    {
        $this->speed = $speed;
    
        return $this;
    }

    /**
     * Get speed
     *
     * @return float 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return Curve
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    
        return $this;
    }

    /**
     * Get identifier
     *
     * @return string 
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set hasoperation
     *
     * @param boolean $hasoperation
     * @return Curve
     */
    public function setHasoperation($hasoperation)
    {
        $this->hasoperation = $hasoperation;
    
        return $this;
    }

    /**
     * Get hasoperation
     *
     * @return boolean 
     */
    public function getHasoperation()
    {
        return $this->hasoperation;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Curve
     */
    public function setRemark(\string $remark)
    {
        $this->remark = $remark;
    
        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set line
     *
     * @param Acme\DataBundle\Entity\Line $line
     * @return Curve
     */
    public function setLine(\Acme\DataBundle\Entity\Line $line = null)
    {
        $this->line = $line;
    
        return $this;
    }

    /**
     * Get line
     *
     * @return Acme\DataBundle\Entity\Line 
     */
    public function getLine()
    {
        return $this->line;
    }
}