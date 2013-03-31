<?php

namespace Acme\DataanalysisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeDataanalysisBundle:Default:index.html.twig', array('name' => $name));
    }
}
