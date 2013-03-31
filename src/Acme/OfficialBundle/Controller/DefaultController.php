<?php

namespace Acme\OfficialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeOfficialBundle:Default:index.html.twig', array('name' => $name));
    }
}
