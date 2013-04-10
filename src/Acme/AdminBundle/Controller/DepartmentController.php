<?php

namespace Acme\AdminBundle\Controller;
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-10
 * 
 * 本controller用于部门管理
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DepartmentController extends Controller
{
    /**
     * @Route("/admin/department" ,  name="admin_department")
     * @Template()
     */
    public function indexAction()
    {
    	/*
    	 * OR_TODO 添加部门列表的查看
    	 */
    	
    	
        return array();
    }
    
    
}
