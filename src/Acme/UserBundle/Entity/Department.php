<?php

/*
 *
 * (c) liuqingjie06 <http://railmaps.org/>
 *  利用doctrine的Tree扩展建立树状的结构
 * 部门实体 用于创建部门表
 */

namespace Acme\UserBundle\Entity;

use Acme\UserBundle\Model\DepartmentInterface;
use Gedmo\Mapping\Annotation as Gedmo;    //doctrine 扩展插件
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Acme\UserBundle\Entity\Department
 * @Gedmo\Tree(type="nested")
 * @ORM\Entity
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
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
     * @Assert\NotBlank()
     */
    private $name;
    
    
    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer", nullable=true)
     * 
     */
    private $lft;
    
    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer", nullable=true)
     */
    private $lvl;
    
    /**
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer", nullable=true)
     */
    private $rgt;
    
    /**
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;
    
    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;
    
    /**
     * @ORM\OneToMany(targetEntity="Department", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;
    
//     /**
//      * @ORM\Column(name="fatherid", type="integer")
//      **/
//      private $fatherid;
     
//      public $father;

   
    
    
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
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function getParent()
    {
    	return $this->parent;
    }
    
    public function setParent($id)
    {
    	$this->parent = $id;
    }
    
    public function getName()
    {
    	return $this->name;
    }
    
    public function setName($name)
    {
    	$this->name=$name;
    }
    
    

    /**
     * Set lft
     *
     * @param integer $lft
     * @return Department
     */
    public function setLft($lft)
    {
        $this->lft = $lft;
    
        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return Department
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
    
        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return Department
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
    
        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     * @return Department
     */
    public function setRoot($root)
    {
        $this->root = $root;
    
        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Add children
     *
     * @param Acme\UserBundle\Entity\Department $children
     * @return Department
     */
    public function addChildren(\Acme\UserBundle\Entity\Department $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param Acme\UserBundle\Entity\Department $children
     */
    public function removeChildren(\Acme\UserBundle\Entity\Department $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add user
     *
     * @param Acme\UserBundle\Entity\User $user
     * @return Department
     */
    public function addUser(\Acme\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param Acme\UserBundle\Entity\User $user
     */
    public function removeUser(\Acme\UserBundle\Entity\User $user)
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
}