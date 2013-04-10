<?php 
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * 
 * @author liuqingjie06
 * date: 2013-4-10
 * 用户管理表与用户表1对1关系，是用户表的补充
 */
namespace Acme\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\UserBundle\Entity\Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 */


class Person 
{
	//OR_TODO  未完成 添加人员管理表 OR_PERSON
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 *
	 */
	protected $id;
	
	/**
	 * @ORM\Column(name="realname",type="string")
	 */
	protected $realname;
	
	/**
	 * @ORM\Column(name="zhicheng",type="string" ,nullable=TRUE)
	 * 职称
	 */
	protected $zhicheng;

	/**
	 * @ORM\Column(name="sex",type="string", nullable=TRUE)
	 * 性别
	 */
	protected $sex;

	/**
	 * @ORM\Column(name="level",type="string" ,nullable=TRUE)
	 * 级别
	 */
	protected $level;

	/**
	 * @ORM\Column(name="skill",type="string", nullable=TRUE)
	 * 专业技术资格
	 */
	protected $skill;
	

	/**
	 * @ORM\Column(name="birthday",type="date",nullable=TRUE)
	 * 出生年月
	 */
	protected $birthday;

	/**
	 * @ORM\Column(name="joinday",type="date",nullable=TRUE)
	 * 参加工作时间
	 */
	protected $joinday;

	/**
	 * @ORM\Column(name="politics",type="string",nullable=TRUE)
	 * 政治面貌
	 */
	protected $politics;

	/**
	 * @ORM\Column(name="remark",type="text", nullable=TRUE)
	 * 备注
	 */
	protected $remark;
	

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
     * Set zhicheng
     *
     * @param string $zhicheng
     * @return Person
     */
    public function setZhicheng($zhicheng)
    {
        $this->zhicheng = $zhicheng;
    
        return $this;
    }

    /**
     * Get zhicheng
     *
     * @return string 
     */
    public function getZhicheng()
    {
        return $this->zhicheng;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Person
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set level
     *
     * @param string $level
     * @return Person
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return string 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set skill
     *
     * @param string $skill
     * @return Person
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
    
        return $this;
    }

    /**
     * Get skill
     *
     * @return string 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Person
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set joinday
     *
     * @param \DateTime $joinday
     * @return Person
     */
    public function setJoinday($joinday)
    {
        $this->joinday = $joinday;
    
        return $this;
    }

    /**
     * Get joinday
     *
     * @return \DateTime 
     */
    public function getJoinday()
    {
        return $this->joinday;
    }

    /**
     * Set politics
     *
     * @param string $politics
     * @return Person
     */
    public function setPolitics($politics)
    {
        $this->politics = $politics;
    
        return $this;
    }

    /**
     * Get politics
     *
     * @return string 
     */
    public function getPolitics()
    {
        return $this->politics;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Person
     */
    public function setRemark($remark)
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
     * Set realname
     *
     * @param string $realname
     * @return Person
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
}