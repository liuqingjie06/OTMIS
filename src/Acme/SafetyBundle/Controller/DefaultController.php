<?php

namespace Acme\SafetyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeSafetyBundle:Default:index.html.twig', array('name' => $name));
    }
}
