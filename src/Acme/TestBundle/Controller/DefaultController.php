<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeTestBundle:Default:index.html.twig');
    }
    
    public function mainAction()
    {
    	$hello=$this->get('hello');
    	echo $hello->show("liuqingjie");
    	return $this->render('AcmeTestBundle:Default:mainpage.html.twig');
    }
}
