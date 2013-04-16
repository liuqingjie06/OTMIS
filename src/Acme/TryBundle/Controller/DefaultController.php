<?php

namespace Acme\TryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\TryBundle\Entity\Menu;
use Acme\TryBundle\TreeClass\TreeSort;
use Acme\TryBundle\Model\GetDetection;
use Acme\TryBundle\Entity\Detection;
use Acme\TryBundle\Entity\comment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;

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
    	
    	set_time_limit(0);//设置超时时间
    	//创建一个menu对象
    	$repository = $this->getDoctrine()->getRepository('AcmeTryBundle:Menu');
    	$menu = $repository->findAll();
    	$tree=new TreeSort($menu,3);  
    	$submenu=$tree->getTree();
    	
    	//读取线路动检数据
    	$uri="http://localhost/data/hanyi1/TQI.html";
    	$getdetect=new GetDetection($uri);
    	$file=$getdetect->getdataHtml();
// 		$file=$getdetect->getData();

        
		
		$date = new \DateTime("2013-1-13");
		$error = "new string";
		for ($i=0;$i<count($file);$i++){		//
			$detection=new Detection();
			$em = $this->getDoctrine()->getEntityManager();
			$detection->setDate($date);
			$detection->setMileage((float)$file[$i][1]); //里程
			$detection->setError(iconv("GB2312","UTF-8",$file[$i][2])); //超限
			$detection->setLAlign((float)$file[$i][3]); //左轨向
			$detection->setRAlign((float)$file[$i][4]); //里程
			$detection->setLSurf((float)$file[$i][5]);  
			$detection->setRSurf((float)$file[$i][6]); 
			$detection->setLevel((float)$file[$i][7]);
			$detection->setGuage((float)$file[$i][8]);
			$detection->setTwist((float)$file[$i][9]);
			$detection->setTqi((float)$file[$i][10]);
			$detection->setOog(iconv("GB2312","UTF-8",$file[$i][11]));
			$detection->setSpeed((integer)$file[$i][12]);
		    $detection->setStandard($file[$i][13]);
			$em->persist($detection);
			$em->flush();
		}

    	return array('menu'=>$menu,
    			'submenu'=>$submenu,
    			'file'=>$file
    			);

    }
    
    
    /**
     * @Route("/comment",name="comment")
     * @Template()
     */
    public function commentAction(Request $request)
    {
    	
    	//测试一下Acl
    	// create a task and give it some dummy data for this example
    	$comment = new comment();
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$comment->setUid($user->getId());
     	$comment->setDate(new \DateTime('today'));
    	
    	$form = $this->createFormBuilder($comment)
    	->add('comment', 'text')
    	->add('Date', 'date')
    	->getForm();
    	
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    	
    		if ($form->isValid()) {
    			// perform some action, such as saving the task to the database
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($comment);
    			$em->flush();
    			
    			// 创建ACL
    			$aclProvider = $this->get('security.acl.provider');
    			$objectIdentity = ObjectIdentity::fromDomainObject($comment);
    			$acl = $aclProvider->createAcl($objectIdentity);
    			
    			// 检索当前登录用户的安全标识
    			$securityContext = $this->get('security.context');
    			$user = $securityContext->getToken()->getUser();
    			$securityIdentity = UserSecurityIdentity::fromAccount($user);
    			
    			// 授予所有者权限
    			$acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
    			$aclProvider->updateAcl($acl);
    			
    			return $this->redirect('commentlist');
    		}
    	}
    	
    	return $this->render('AcmeTryBundle:Default:comment.html.twig', array(
    			'form' => $form->createView(),
    	));
    }
    
    /**
     * @Route("/commentlist",name="commentlist")
     * @Template()
     */
    public function commentlistAction(Request $request)
    {
    	$repository = $this->getDoctrine()->getRepository('AcmeTryBundle:comment');
    	$comment = $repository->findAll();
    	$securityContext = $this->get('security.context');
    	
    	$user = $this->get('security.context')->getToken()->getUser();
//     	$user->addRole('ROLE_COMMENT_READER');
//     	$em = $this->getDoctrine()->getEntityManager();
//     	$em->flush();
    	$userrole=$user->getRoles();
    	
    		
    	return $this->render('AcmeTryBundle:Default:commentlist.html.twig', array(
    			'comment' => $comment,'role'=>$userrole));
    	
    }
    
    /**
     * @Route("/addrole",name="addrole")
     * @Template()
     */
    public function addrolwAction()
    {
//     	$repository = $this->getDoctrine()->getRepository('AcmeUserBundle:User');
//     	$user = $repository->findAll();
    	
    	$user = $this->get('security.context')->getToken()->getUser();
    	//$user->addRole("ROLE_ADMIN");
    	return $this->render('AcmeTryBundle:Default:addrole.html.twig', array(
    			'user' => $user));
    }
    
}
