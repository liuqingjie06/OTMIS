<?php

namespace Acme\UserBundle\Controller;
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-11
 * 
 * 本controller用于用户的创建和导入
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CreateUserController extends Controller
{

	/**
	 * @Route("/admin/createuser" ,  name="create_user")
	 * @Template()
	 */
    public function indexAction()
    {
    	/*
    	 * OR_TODO 创建用户
    	 */
    	return array();

    }
    
    
}