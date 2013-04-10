<?php
// src/Acme/UserBundle/Entity/User.php

namespace Acme\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * 
	 */
	protected $id;
	


	public function __construct()
	{
		parent::__construct();
		// your own logic
	}
	
	 /**
     * @ORM\ManyToOne(targetEntity="Acme\UserBundle\Entity\Department")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    protected $department;
    
    /**
     * @ORM\OneToOne(targetEntity="Acme\MainBundle\Entity\Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    protected $person;
    
    /**
     * @ORM\Column(name="realname",type="string")
     */
	protected $realname;

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
     * Set department
     *
     * @param Acme\UserBundle\Entity\Department $department
     * @return User
     */
    public function setDepartment(\Acme\UserBundle\Entity\Department $department = null)
    {
        $this->department = $department;
    
        return $this;
    }

    /**
     * Get department
     *
     * @return Acme\UserBundle\Entity\Department 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set realname
     *
     * @param string $realname
     * @return User
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;
    
        return $this;
    }

    /**
     * Get realname
     *
     * @return string 
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * Set person
     *
     * @param Acme\UserBundle\Entity\Person $person
     * @return User
     */
    public function setPerson(\Acme\UserBundle\Entity\Person $person = null)
    {
        $this->person = $person;
    
        return $this;
    }

    /**
     * Get person
     *
     * @return Acme\UserBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}