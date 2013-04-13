<?php
/**
 * 
 * @author liuqingjie06
 * 2013-4-13
 * 本控制器为测试控制器，用于赋予用户权限。
 *
 */
namespace Acme\AdminBundle\Controller;

use JMS\SecurityExtraBundle\Security\Util\String;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Acme\UserBundle\Entity\User;

class RoleController extends Controller
{
	/**
	 * @Route("/admin/role", name="role_admin")
	 * @Template()
	 */
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$user = $repository->findAll();
		return array('user' => $user);
	}
	
	/**
	 * @Route("/admin/role/update/{userid}",name="update_role")
	 * @Template()
	 */
	public function updateRoleAction($userid,Request $request)
	{
		$userrepo = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
		$rolerepo = $this->getDoctrine()->getRepository('AcmeUserBundle:Role');
		$roles = $rolerepo->findAll();
		$user = $userrepo->find($userid);
		
		if($request->isMethod('POST'))
		{			
			
			foreach($roles as  $role) {
				if(in_array($role->getName(), $_POST))
				{
					$user->addRole($role->getName());
				}else{
					$user->removeRole($role->getName());
				}
			}
			
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			return $this->redirect($this->generateUrl('role_admin'));
			
		}
		return array('user'=>$user, 'roles'=>$roles);
	}
	
	/**
	 * @Route("/admin/role/enableuser/{userid}",name="enable_user")
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
	 * @Route("/admin/role/disableuser/{userid}",name="disable_user")
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
