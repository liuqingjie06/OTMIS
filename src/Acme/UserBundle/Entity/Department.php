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
use Doctrine\Common\Collections\ArrayCollection;
use Acme\UserBundle\Entity\User;

/**
 * Acme\UserBundle\Entity\Department
 * @ORM\Entity
 * @ORM\Table(name="department")
 * 
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
     * @ORM\Column(name="name",type="string",length=255)
     * 
     */
    private $name;
    
    
    /**
     * @ORM\Column(name="fatherid", type="integer")
     **/
     private $fatherid;
     
     public $father;

   
    
    
    /**
     * use Doctrine\Common\Collections\ArrayCollection;
     */
    
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="department")
     */
    protected $user;
    
    
    public function __construct()
    {
    	$this->user = new ArrayCollection();
    }
    
    public function __toString()
    {
    	return $this->name;
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
     * Add user
     *
     * @param Acme\UserBundle\Entity\user $user
     * @return Department
     */
    public function addUser(\Acme\UserBundle\Entity\user $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param Acme\UserBundle\Entity\user $user
     */
    public function removeUser(\Acme\UserBundle\Entity\user $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set fatherid
     *
     * @param integer $fatherid
     * @return Department
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
}