<?php

namespace Acme\TryBundle\Model;
require_once __DIR__.'/../../../../vendor/Goutte-master/goutte.phar';
//require_once __DIR__.'/../../../../vendor/querypath/QueryPath/src/qp.php';
use Goutte\Client;
use Acme\TryBundle\Entity\Detection;
/**
 * @data 2-13-4-5
 * @author admin
 * 
 * 用于从html文件中提取数据存入数据库中:
 * @param 
 * $html: html对象
 * $url: html的路径
 * $crawler: 爬虫
 */

class GetDetection 
{
	private $html;
	private $url;
	private $crawler;
	private $data;
	
	
	public function __construct($url)
	{
		//初始化客户端Client，建立爬虫
		$this->url=$url;
		$client = new Client();
		$this->crawler = $client->request('GET', $this->url);
	}
	
	
	
	
	public function getData()
	{
		/**
		 * @return data
		 * 读取全部数据，并转化为字符串数组格式
		 */
		$count=$this->count();
		for ($row=0; $row<$count; $row++)
		{
			$this->data[]=$this->getOne($row);
		}
// 		$this->data=$this->crawler->filter('tr ')->children()->text();
		return $this->data;
	}
	
	private function count()
	{		
		/**
		 *@return count html数据的行数	
		 */
	    $count=$this->crawler->filter('tr')->count()-2;
		return $count;
	}
	
	private function getOne($row)
	{
		/**
		 * @return data_object
		 * 读取一行数据，由于有表头，行数要加上表头的行数--2
		 */
		$head=2;//表头行数
		$str=$this->crawler->filter('tr')->eq($row+$head)->text();
		$str=str_replace(' ', '', $str);  //消除空格
		$result=explode(PHP_EOL,$str);    //用换行符分割字符串
		return $result;
	}
	
	public function getdataHtml(){
		$html=file_get_contents($this->url);     //将HTML文件解析成字符串
		$pos_first = stripos($html,"<tr>");      //查找《tr》标签首次出现的位置
		$pos_last = strrpos($html,"</tr>");      //查找</tr>标签最后出现的位置
		$length=$pos_last-$pos_first+1;          //计算两者的差值
		$html=substr($html,$pos_first,$length);  //截取字符串
		
		
		$html = strip_tags($html,'<tr>');       //删除HTML标签
		$html=str_replace(' ', '', $html);  //消除空格
		//$html=str_replace(PHP_EOL, '', $html);  //消除空格
		$html=explode(htmlspecialchars_decode('</TR>'.PHP_EOL.'<TR>'),$html);    //用换行符分割字符串
		
		foreach($html as $item)
		{
			$this->data[] = explode(htmlspecialchars_decode(PHP_EOL),$item);
		}
			
		$this->data=array_splice($this->data, 2);  //删除表头	
		return $this->data;
	}
	
	public function TQI()
	{
		$detection=new Detection();
		$em = $this->getDoctrine()->getEntityManager();
		for ($i=0;$i<5;$i++){		//count($this->data)
			$detection->setMileage((float)$this->data[$i][1]); //里程
			$detection->setError($this->data[$i][2]); //超限
			$detection->setLAlign((float)$this->data[$i][3]); //左轨向
			$detection->setRAlign((float)$this->data[$i][4]); //里程
			$detection->setLSurf((float)$this->data[$i][5]);  //缺水平
			$detection->setRSurf((float)$this->data[$i][6]);  //缺水平
			$detection->setGuage((float)$this->data[$i][7]);
			$detection->setTwist((float)$this->data[$i][8]);
			$detection->setTqi((float)$this->data[$i][9]);
			$detection->setOog($this->data[$i][10]);
			$detection->setSpeed((float)$this->data[$i][11]);
		    $detection->setStandard($this->data[$i][12]);
			$em->persist($detection);
			$em->flush();
		}
		
		
	}
	
	
	
}

?>