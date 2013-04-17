<?php

namespace Acme\DataBundle\Controller;
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-10
 *
 * 本controller用于线路信息的管理
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DataBundle\Entity\Line;
use Symfony\Component\HttpFoundation\Request;

class LineController extends Controller
{
	/**
	 * @Route("/data/line", name="line")
	 * @Template()
	 */
	
	public function indexAction()
	{
		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Line');
		$line=$repo->findAll();
		
		
		return array('line'=>$line);
	}
	
	/**
	 * @Route("/data/line/create", name="line_create")
	 * @Template()
	 */
	public function createAction(Request $request)
	{
		$line = new Line();
		$em = $this->getDoctrine()->getEntityManager();
		if($request->isMethod('POST')){
			$line->setName($_POST["name"]);
			$line->setNumber($_POST["number"]);
			$em->persist($line);
			$em->flush();
			return $this->redirect($this->generateUrl('line'));
		}
			
		return array();
	}
	
	/**
	 * @Route("/data/line/delate/{id}", name="line_delate")
	 * @Template()
	 */
	public function delateAction($id)
	{
		$line = new Line();
		$repository = $this->getDoctrine()->getRepository('AcmeDataBundle:Line');
		$line=$repository->findOneById($id);
		$em = $this->getDoctrine()->getEntityManager();
		$em->remove($line);
		$em->flush();
		return $this->redirect($this->generateUrl('line'));
	}
	
	/**
	 * @Route("/data/line/edit/{id}", name="line_update")
	 * @Template()
	 */
	public function updateAction(Request $request,$id)
	{
		$line = new Line();
		$repository = $this->getDoctrine()->getRepository('AcmeDataBundle:Line');
		$line=$repository->findOneById(intval(trim($id), 10));
		$em = $this->getDoctrine()->getEntityManager();
		if($request->isMethod('POST')){
			$line->setName($_POST["name"]);
			$line->setNumber($_POST["number"]);
			$em->flush();
			return $this->redirect($this->generateUrl('line'));
		}
	}
	
}