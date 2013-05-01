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
	 *  @Route("/data/line/get",name="line_get")
	 * 
	 */
	public function getAction(Request $request)
	{
		
		$em = $this->getDoctrine()->getEntityManager();
		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Line');
		///如果页面向后台发出数据，对数据进行更新并返回给页面
		if($request->isMethod('POST')){
			if($request->get('action')=='create'){
				$line = new Line();
				$line->setNumber($request->get('data')["number"]);
				$line->setName($request->get('data')["name"]);
				//对数据进行验证 
				$output=$this->createLine($line);
				return new Response(json_encode( $output ));    			
			}elseif($request->get('action')=='edit'){
				$id = str_replace( "row_","",$request->get('id'));				
				$line=$repo->findOneById(intval($id));
				if(!$line){
					$output = array(
							"id"=>"",
							"error"=>"没有找到对象",
							"fieldErrors"=>[],
							"data"=>[],
					);
					return new Response(json_encode( $output ));
				}
				$line->setNumber($request->get('data')["number"]);
				$line->setName($request->get('data')["name"]);
				//对数据进行验证
				$output=$this->updateLine($line);
				return new Response(json_encode( $output ));				
			}elseif($request->get('action')=='remove'){
				$id = str_replace( "row_","",$request->get('data')[0]);				
				$line=$repo->findOneById(intval($id));
				if(!$line){
					$output = array(
							"id"=>"",
							"error"=>"没有找到对象",
							"fieldErrors"=>[],
							"data"=>[],
					);
					return new Response(json_encode( $output ));
				}
				$line=$repo->findOneById(intval($id));
				$em->remove($line);
				$em->flush();
				$output = array(
						"id"=>-1,
						"error"=>"",
						"fieldErrors"=>[],
						"data"=>[]
				);
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
			$row["DT_RowId"] = "row_".$line[$i]['id'] ;
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
				$filederror['name']=$errors[$i]->getPropertyPath();
				$filederror['status']= $errors[$i]->getMessage();
				$fieldErrors[]=$filederror;
			}
		
			$output = array(
					"id"=>"",
					"error"=>"数据填写有误",
					"fieldErrors"=>$fieldErrors,
					"data"=>[]
			);
			return  $output;
		} else {
			$em->persist($line);
			$em->flush();
			//返回一个结果给前台
			$output = array(
					"id"=>strval($line->getId()),
					"error"=>"",
					"fieldErrors"=>[],
					"data"=>[],
					"row"=>array(
							"DT_RowId"=>strval($line->getId()),
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
					"id"=>"",
					"error"=>"数据填写有误",
					"fieldErrors"=>$fieldErrors,
					"data"=>[]
			);
			return  $output;
		} else {
			$em->flush();			 //返回一个结果给前台
			$output = array(
					"id"=>"row_".$line->getId(),
					"error"=>"",
					"fieldErrors"=>[],
					"data"=>[],
					"row"=>array(
							"DT_RowId"=>"row_".$line->getId(),
							"name" => $line->getName(),
							"number" => $line->getNumber()
					)
			);
			return $output;
		}
	}
	
}