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
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
    	$department = $repository->findAll();
    	
    	foreach($department as $item){
    		//利用fatherid查找其子部门
    		$item->father = $repository->findOneById($item->getFatherid());
    	}
    	
    	
        return array('department'=>$department);
    }
    
//     /**
//      * @Route("/{demaprtment}/" ,  name="admin_department_user")
//      * @Template()
//      */
//     public function DepartmentUserAction()
//     {
//     	return array();
//     }
        
    
}
