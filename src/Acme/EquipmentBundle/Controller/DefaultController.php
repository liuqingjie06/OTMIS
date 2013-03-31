<?php

namespace Acme\EquipmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeEquipmentBundle:Default:index.html.twig', array('name' => $name));
    }
}
