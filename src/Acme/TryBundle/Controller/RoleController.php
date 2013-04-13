<?php
/**
 * 
 * @author liuqingjie06
 * 2013-4-13
 * 本控制器为测试控制器，用于赋予用户权限。
 *
 */
namespace Acme\TryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Acme\UserBundle\Entity\User;

class RoleController extends Controller
{
	/**
	 * @Route("/test/role", name="role_admin")
	 * @Template()
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$user = $repository->findAll();
		return array('user' => $user);
	}
	
	/**
	 * @Route("/test/addrole/{userid}",name="add_role")
	 * @Template()
	 */
	public function addRoleAction($userid,Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$user = $repository->find($userid);
		
		if($request->isMethod('POST'))
		{			
			foreach($_POST as $key => $value) {
				$role="ROLE_".strtoupper($key);
				$user->addRole($role);
			}
			
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			return $this->redirect($this->generateUrl('role_admin'));

			
		}
		return array('user'=>$user);
	}
	
	/**
	 * @Route("/test/enableuser/{userid}",name="enable_user")
	 * @Template()
	 */
	public function enableUserAction($userid)
	{
		$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$user = $repository->find($userid);
		$user->setEnabled(TRUE);
		$em = $this->getDoctrine()->getManager();
		$em->flush();
		
		return $this->redirect($this->generateUrl('role_admin'));
	}
	
	/**
	 * @Route("/test/disableuser/{userid}",name="disable_user")
	 * @Template()
	 */
	public function disableUserAction($userid)
	{
		$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$user = $repository->find($userid);
		$user->setEnabled(FALSE);
		$em = $this->getDoctrine()->getManager();
		$em->flush();
		
		return $this->redirect($this->generateUrl('role_admin'));
	}
	
}
