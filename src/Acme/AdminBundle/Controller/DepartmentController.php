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
use Symfony\Component\HttpFoundation\Request;
use Acme\UserBundle\Entity\Department;

class DepartmentController extends Controller
{
    /**
     * @Route("/admin/department" ,  name="department")
     * @Template()
     */
    public function indexAction()
    {
    	/*
    	 * OR_TODO 添加部门列表的查看
    	 */
     	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
//      	$department = $repository->findAll();
    	
//      	$options = array(
//      			'decorate' => true,
//      			'rootOpen' => '<ul>',
//      			'rootClose' => '</ul>',
//      			'childOpen' => '<li>',
//      			'childClose' => '</li>',
//      			'nodeDecorator' => function($node) {
//      				return '<a href="/page/'.$node['id'].'">'.$node['name'].'</a>';
//      			}
//      	);
     	
     	$htmlTree = $repository->childrenHierarchy(
     			null, /* starting from root nodes */
     			false /* load all children, not only direct */
     			
     	);

  	
        return array('htmltree'=>$htmlTree);
    }
    
    /**
     * 创建部门
     * @Route("/admin/department/create/{parentid}" ,  name="create_department")
     * @Template()
     */
    public function createDepartmentAction($parentid)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
    	$department=new Department();
    	if('null'==$parentid)	{
    		 $department->setName($_POST["name"]);
    	}else{
    		$parent = new Department();    		
    		$parent=$repository->findOneById(intval(trim($parentid), 10));
    		$department->setName($_POST["name"]);
    		$department->setParent($parent);    	
    	}
    	
    	$em->persist($department);
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl('department'));
    }    
    
    /**
     * 部门排序增加1位
     * @Route("/admin/department/moveup" ,  name="department_moveup")
     * @Template()
     */
    public function moveUpAction()
    {
    	$department = new Department();
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
    	$em = $this->getDoctrine()->getEntityManager();
    	$department = $repository->findOneById(($_GET['id']));
    	$repository->moveUp($department,1);
    	$em->flush();
    	return $this->redirect($this->generateUrl('department'));
    }
    
    /**
     * 部门排序减少1位
     * @Route("/admin/department/movedown" ,  name="department_movedown")
     * @Template()
     */
    public function moveDownAction()
    {
    	$department = new Department();
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
    	$em = $this->getDoctrine()->getEntityManager();
    	$department = $repository->findOneById($_GET['id']);
    	$repository->moveDown($department,1);
    	$em->flush();
    	return $this->redirect($this->generateUrl('department'));
    }
    
    /**
     * 部门排序减少1位
     * @Route("/admin/department/delete" ,  name="department_delete")
     * @Template()
     */
    public function deleteAction()
    {
    	$department = new Department();
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:Department');
    	$em = $this->getDoctrine()->getEntityManager();
    	$department = $repository->findOneById($_GET['id']);
    	$em->remove($department);
    	$em->flush();
    	return $this->redirect($this->generateUrl('department'));
    }
}
