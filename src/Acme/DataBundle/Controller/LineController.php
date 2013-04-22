<?php

namespace Acme\DataBundle\Controller;
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-10
 *
 * 本controller用于线路信息的管理
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DataBundle\Entity\Line;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LineController extends Controller
{
	/**
	 * @Route("/data/line", name="line")
	 * @Template()
	 */
	
	public function indexAction()
	{
// 		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Line');
// 		$line=$repo->findAll();
		
		
		return array();
	}
	
	
	/**
	 *  与主页面进行数据交互，将线路数据返回为json格式
	 *  @Route("/data/get",name="line_get")
	 * 
	 */
	public function getAction(Request $request)
	{
		$line = new Line();
		$em = $this->getDoctrine()->getEntityManager();
		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Line');
		///如果页面向后台发出数据，对数据进行更新并返回给页面
		if($request->isMethod('POST')){
			if($request->get('action')=='create'){
				$line->setNumber($request->get('data')["number"]);
				$line->setName($request->get('data')["name"]);
				//对数据进行验证 
				$output=$this->createLine($line);
				return new Response(json_encode( $output ));    			
			}elseif($request->get('action')=='edit'){
				$line=$repo->findOneById($request->get('id'));
				$line->setNumber($request->get('data')["number"]);
				$line->setName($request->get('data')["name"]);
				//对数据进行验证
				var_dump($line);
				//$output=$this->updateLine($line);
				return new Response(json_encode( $output ));
				
			}
		}
		$query = $em->createQuery(
    		'SELECT p.name,p.number,p.id FROM AcmeDataBundle:Line p'
		);
		$line = $query->getResult();	
		$iTotal = count($line);
		$iFilteredTotal = count($line);
		//输出结果

		
		$output = array(
				"sEcho" => 1,
				"id"=>-1,
				"error" => "",
				"fieldErrors" => [],
				"data" => [],
				"iTotalRecords" =>"4",
				"iTotalDisplayRecords" =>"4",
				"aaData" => array()
		);
		
	
		for ($i=0; $i<count($line); $i++){
			$row=array();
			$row["DT_RowID"]=$line[$i]['id'];
			$row["number"]=$line[$i]['number'];
			$row["name"]=$line[$i]['name'];
			$output['aaData'][]=$row;
		}
		
		return new Response(json_encode( $output ));
		
	}
	
	
	/**
	 * 测试页面
	 * @Route("/data/testget")
	 * @Template()
	 */
	public function testgetAction(){
		return array();
	}

	/**
	 * 通过ajax发来的数据创建新的线路数据
	 * @param Line() $line
	 * @return $output
	 */

	private function createLine($line)
	{
		$validator = $this->get('validator');
		$errors = $validator->validate($line);
		$em = $this->getDoctrine()->getEntityManager();
		if (count($errors) > 0) {
		
			for($i=0;$i<count($errors);$i++){
				//     					var_dump($errors[$i]->getmessage());
				//     					var_dump($errors[$i]->getPropertyPath());
				$filederror['name']=$errors[$i]->getPropertyPath();
				$filederror['status']= $errors[$i]->getMessage();
				$fieldErrors[]=$filederror;
			}
		
			$output = array(
					"id"=>"row_31",
					"error"=>"数据填写有误",
					"fieldErrors"=>$fieldErrors,
					"data"=>[],
			);
			return  $output;
		} else {
			$em->persist($line);
			$em->flush();
			// 				 //返回一个结果给前台
			$output = array(
					"id"=>"row_31",
					"error"=>"",
					"fieldErrors"=>[],
					"data"=>[],
					"row"=>array(
							"DT_RowId"=>"row_30",
							"name" => $line->getName(),
							"number" => $line->getNumber()
					)
			);
			return $output;
		}
	}
	
	
	/**
	 * 通过ajax发来的数据 修改 的线路数据
	 * @param Line() $line
	 * @return $output
	 */

	private function updateLine($line)
	{
		$validator = $this->get('validator');
		$errors = $validator->validate($line);
		$em = $this->getDoctrine()->getEntityManager();
		if (count($errors) > 0) {
		
			for($i=0;$i<count($errors);$i++){
				$filederror['name']=$errors[$i]->getPropertyPath();
				$filederror['status']= $errors[$i]->getMessage();
				$fieldErrors[]=$filederror;
			}
		
			$output = array(
					"id"=>"row_31",
					"error"=>"数据填写有误",
					"fieldErrors"=>$fieldErrors,
					"data"=>[],
			);
			return  $output;
		} else {
			$em->flush();
			// 				 //返回一个结果给前台
			$output = array(
					"id"=>"row_31",
					"error"=>"",
					"fieldErrors"=>[],
					"data"=>[],
					"row"=>array(
							"DT_RowId"=>"row_30",
							"name" => $line->getName(),
							"number" => $line->getNumber()
					)
			);
			return $output;
		}
	}
	
}