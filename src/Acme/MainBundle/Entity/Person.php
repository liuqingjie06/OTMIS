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
use Acme\UserBundle\Entity\User as User;

/**
 * Acme\UserBundle\Entity\Department
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 */


class Person 
{
	//OR_TODO  添加人员管理表 OR_PERSON
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 *
	 */
	protected $id;
	

	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}