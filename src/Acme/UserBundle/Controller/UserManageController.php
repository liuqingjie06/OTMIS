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
use Symfony\Component\HttpFoundation\Request;
use Acme\UserBundle\Entity\User;
use Acme\UserBundle\Form\Type\UserType;

class UserManageController extends Controller
{
	/**
	 * @Route("/admin/createuser" ,  name="create_user")
	 * @Template()
	 */
    public function createAction(Request $request)
    {
    	/*
    	 * OR_TODO 创建用户功能
    	 */
    	$user = new User();
    	$user->setEmail('2@1.com')
    		->setPlainPassword('111111')
    		->setEnabled(TRUE);
    	
    	$form = $this->createForm(new UserType(), $user);
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			/**
    			 * OR_TODO  提交表单并更新数据库
    			 */
    			
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($user->getPerson());
    			$em->persist($user);
    			$em->flush();
    			return $this->redirect($this->generateUrl('user'));
    			
    			
    		}
    	}
    	return array('form' => $form->createView());

    }
    
    /**
     * @Route("/admin/user" ,  name="user")
     * @Template()
     */
    public function indexAction()
    {
    	//创建用户成功
    	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
    	$user = $repository->findAll();
    	return array('user' => $user);
    }
    
    
}