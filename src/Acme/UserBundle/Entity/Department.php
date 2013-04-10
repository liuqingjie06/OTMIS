<?php

/*
 *
 * (c) liuqingjie06 <http://railmaps.org/>
 *  
 * 部门实体 用于创建部门表
 */

namespace Acme\UserBundle\Entity;

use Acme\UserBundle\Model\DepartmentInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\UserBundle\Entity\Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity
 */

class Department implements DepartmentInterface
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
     * @ORM\Column(name="name",type="string",length="255")
     * 
     */
    private $name;
    
    /**
     * @ORM\Column(name="fatherid",type="integer")
     *
     */
    private $fatherid;
    
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
     * Get name
     * 
     * @return string     * 
     */
    public function getName()
    {
    	return $this->name;
    }
    
    /**
     * Set name
     * 
     * @return Department
     */
    public function setName($name)
    {
    	$this->name = $name;
    	return $this;
    }
    
    /**
     * get fatherid
     * @return integer
     */
    public function getFatherId()
    {
    	return $this->fatherid;
    }
    
    
    /**
     * set fatherid
     * @return Department
     */
    public function setFatherId($id)
    {
    	$this->fatherid = $id;
    	return $this;
    }
    
}