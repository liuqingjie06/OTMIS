<?php

namespace Acme\TryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TryBundle\Entity\Menu;
use Acme\TryBundle\TreeClass\TreeSort;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
    
    /**
     * @Route("/createMenu")
     * @Template()
     */    
    public function createMenuAction(){
    	
    	//创建一个menu对象
    	$repository = $this->getDoctrine()->getRepository('AcmeTryBundle:Menu');
    	$menu = $repository->findAll();
    	$tree=new TreeSort($menu,3);  
    	$submenu=$tree->getTree();

    	return array('menu'=>$menu,'submenu'=>$submenu);

    }
}
