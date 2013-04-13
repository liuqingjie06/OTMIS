<?php

namespace Acme\TryBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TryBundle\Entity\Food;


class TreeController extends Controller
{
    /**
     * @Route("/test/tree")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$food = new Food();
    	$food->setTitle('Food');
    	
    	$fruits = new Food();
    	$fruits->setTitle('Fruits');
    	$fruits->setParent($food);
    	
    	$vegetable = new Food();
    	$vegetable->setTitle('Vegetable');
    	$vegetable->setParent($food);
    	
    	$carrots = new Food();
    	$carrots->setTitle('Carrots');
    	$carrots->setParent($vegetable);
    	
    	$em->persist($food);
    	$em->persist($fruits);
    	$em->persist($vegetable);
    	$em->persist($carrots);
    	$em->flush();
    	
        return array();
    }
    /**
     * @Route("/test/tree/show", name="tree_show")
     * @Template()
     */
    
    public function showAction()
    {
    	$repo = $this->getDoctrine()->getRepository('AcmeTryBundle:Food');
    	$em = $this->getDoctrine()->getEntityManager();
    	$food = $repo->findOneByTitle('vegetable');
    	
    	echo $food->getTitle();
    	echo $repo->childCount($food, false);
    	// prints: 3
    	echo $repo->childCount($food, true/*direct*/);
    	// prints: 2
     	$children = $repo->children($food);
    	// $children contains:
    	// 3 nodes
    	$children = $repo->children($food, false, 'title');
//     	// will sort the children by title
     	$carrots = $repo->findOneByTitle('Carrots');
//     	$path = $repo->getPath($carrots);
     	$repo->verify();
     	// can return TRUE if tree is valid, or array of errors found on tree
     	$repo->recover();
     	$em->clear(); // clear cached nodes
    	
    	return array();
    }
    

}