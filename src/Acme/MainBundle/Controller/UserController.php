<?php

namespace Acme\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * 
 * @author admin
 * 用于用户管理页面的控制器
 * 
 *
 */
class UserController extends Controller
{
    /**
     * @Route("/User", name="main_user")
     * @Template()
     */
    public function indexAction()
    {
    	/**
    	 * OR_TODO 用户管理的主页，添加相应的代码
    	 */
        return array();
    }
    
    /**
     * @Route("/User/work" , name="main_user_work")
     * @Template()
     */
    public function workAction()
    {
    	/**
    	 * OR_TODO 工作管理，从数据库中读取与自己相关的信息和文件
    	 */
    }
    
    /**
     * @Route("/User/Journal" , name="main_user_journal")
     * @Template()
     */
    public function journalActoin()
    {
    	/**
    	 * OR_TODO 此处添加工作纪实Action代码
    	 */
    }
    
    public function journalEditAction()
    {
    	/**
    	 *OR_TODO 此处添加编辑工作纪实action代码
    	 */	
    }
    
}
