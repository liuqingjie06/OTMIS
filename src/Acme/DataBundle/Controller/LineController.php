<?php

namespace Acme\DataBundle\Controller;


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
		if($request->isMethod('POST')){
			return $this->redirect($this->generateUrl('line'));
		}
			
		return $this->redirect($this->generateUrl('line'));
	}
	
	
	
}