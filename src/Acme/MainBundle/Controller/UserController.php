<?php

namespace Acme\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * 
 * @author admin
 * @data 2013-4-10
 * 用于用户管理页面的控制器
 * 
 *
 */
class UserController extends Controller
{
    /**
     * @Route("/User" ,name="main_user")
     * @Template()
     */
    public function indexAction()
    {
    	/**
    	 * @todo 用户管理的主页，添加相应的代码
    	 */
        return array();
    }
    
    /**
     * @Route("/User/work" ,name="main_user_work")
     * @Template()
     */
    public function workAction()
    {
    	/**
    	 * @todo 工作管理，从数据库中读取与自己相关的信息和文件
    	 */
    }
    
    /**
     * @Route("/User" ,name="main_user")
     * @Template()
     */
    public function journalActoin()
    {
    	/**
    	 * @todo 工作纪实主页，要从数据库中读取工作纪实的文件
    	 */
    }
    
    public function changePasswordAction()
    {
    	/**
    	 * @todo 修改密码页面，添加相关代码
    	 */
    }
}
