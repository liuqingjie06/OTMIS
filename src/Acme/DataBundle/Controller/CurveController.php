<?php
namespace Acme\DataBundle\Controller;
/**
 * (c) liuqingjie06 <liuqingjie06@yahoo.com.cn>
 * @author 刘庆杰
 * date 2013-4-23
 *
 * 本controller用于线路曲线信息的管理
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\DataBundle\Entity\Curve;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CurveController extends Controller
{
	/**
	 * @Route("/data/curve", name="curve")
	 * @Template()
	 */
	
	public function indexAction()
	{
		return array();
	}
	
	/**
	 *  与主页面进行数据交互，将线路数据返回为json格式
	 *  @Route("/data/curve/get",name="curve_get")
	 *
	 */
	public function getAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Curve');
		///如果页面向后台发出数据，对数据进行更新并返回给页面
		if($request->isMethod("POST")){
			$output="";
			return new Response(json_encode( $output ));
		}
		$output=$this->findCurve();
		return new Response(json_encode( $output ));
	}
	
	/**
	 * 
	 */
	private function findCurve()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$repo=$this->getDoctrine()->getRepository('AcmeDataBundle:Curve');
		
		$curves=$repo->findAll();

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
		
		foreach($curves as $curve){
			$row=array();
			$row["DT_RowId"] = "row_".$curve->getId();
			$row["line_name"]=$curve->getLine()->getName();
			$row["workarea"]=$curve->getWorkarea();
			if($curve->getSide()==0){
				$row["side"]="上";
			}elseif($curve->getSide()==1){
				$row["side"]="下";
			}else{
				$row["side"]="单";
			}
			$row["startmileage"]=$curve->getStartmileage();
			$row["stopmileage"]=$curve->getStopmileage();
			$row["radius"]=$curve->getRadius();
			if($curve->getDirecton()==0){
				$row["direction"]="左";
			}else{
				$row["direction"]="右";
			}
			$row['versine']=$curve->getVersine();
			$row['angle']=$curve->getAngle();
			$row['superelevation']=$curve->getSuperelevation();
			$row['widthen']=$curve->getWidthen();
			$row['starttransition']=$curve->getStarttransition();
			$row['stoptransition']=$curve->getStoptransition();
			$row['starttangent']=$curve->getStarttangent();
			$row['stoptangent']=$curve->getStoptangent();
			$row['curvelength']=$curve->getCurvelength();
			$row['slope']=$curve->getSlope();
			$row['speed']=$curve->getSpeed();
			$row['identifier']=$curve->getIdentifier();
			if($curve->getHasoperation()){
				$row['hasoperation']="是";
			}else{
				$row['hasoperation']="否";
			}
			$row['remark']=$curve->getRemark();
			
			$output['aaData'][]=$row;
		}
		return $output;		
	}
}