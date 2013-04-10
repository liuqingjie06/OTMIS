<?php
namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ShowdataController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeTestBundle:Showdata:main.html.twig');
    }
    
    public function getDataAction()
    //通过Ajax技术获得数据
    {
    	$repository = $this->getDoctrine()->getRepository('AcmeTryBundle:Detection');
    	$data = $repository->findAll();
    	$zoom=$_GET['zoom'];
    	foreach ( $data as $item) {
    		$item->setMileage($item->getMileage()*$zoom);
    		$item->setLevel($item->getLevel()*$zoom);	
    	}
    	return $this->render('AcmeTestBundle:Showdata:showdata.html.twig',array('data'=>$data));
    }
    

}
