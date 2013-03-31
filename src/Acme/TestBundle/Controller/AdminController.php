<?php
namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
	public function indexAction()
	{
		return $this->render('AcmeTestBundle:Admin:index.html.twig');
	}

	public function mainAction()
	{
		return $this->render('AcmeTestBundle:Admin:mainpage.html.twig');
	}
}