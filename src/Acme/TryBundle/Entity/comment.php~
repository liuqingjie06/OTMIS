<?php

namespace Acme\TryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TryBundle\Entity\comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity
 */
class comment
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
     * @ORM\Column(name="comment",type="text")
     * 
     *
     */
    private $comment;
    
    /**
     * @ORM\Column(name="uid",type="integer")
     */
    
    private $uid;
    
    /**
     * @ORM\Column(name="date",type="datetime")
     */
    
    private $date;
    

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
     * Set comment
     *
     * @param string $comment
     * @return comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     * @return comment
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    
        return $this;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return comment
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}