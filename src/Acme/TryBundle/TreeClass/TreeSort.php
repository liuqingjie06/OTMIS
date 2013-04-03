<?php
namespace Acme\TryBundle\TreeClass;

use Acme\TryBundle\TreeClass\Tree;
/**
 * 
 * @author liuqingjie06@yahoo.com.cn
 * @data 2013.4.12
 * @copyright railmaps 2013-2014
 * TreeSort类，用于将表提取层级结构
 * 
 * 本类包括以下方法：
 * 1、getid 从表中提取id号
 * 2、sortid 对id号进行排序
 * 
 */

class TreeSort {
	private $table;    //从数据库检索得到的结构，以表的形式表示
	private $tree;
	private $level;
	
	public function __construct($table,$level){
		$this->table= $table;
		$this->level=$level;
		$this->tree =array();
	}
	
	private function getRoot(){
		
		foreach ($this->table as  $key=>$item){
			if($item->getFatherid()<0) {
				$this->tree[]=new Tree($item->getId(),$key);	
			}
		}
	}
	
	private function twoLevelsort(){
		//二级树状结构排序
		foreach($this->tree as $key1=>$item1){
			foreach ($this->table as $key2 => $item2){
				if($item1->id==$item2->getFatherid()) $this->tree[$key1]->arr[]=new Tree($item2->getId(),$key2);
			}
		}
	}
	
	private function threeLevelsort(){
		//三级树状结构排序
		foreach($this->tree as $key1=>$item1){
			$subkey=0;  //计数器
			foreach ($this->table as $key2 => $item2){				
				if($item1->id==$item2->getFatherid()) {
					$this->tree[$key1]->arr[]=new Tree($item2->getId(),$key2);					
					foreach ($this->table as $key3 => $item3) {
						if($item2->getId()==$item3->getFatherid()){
							$this->tree[$key1]->arr[$subkey]->arr[]=new Tree($item3->getId(),$key3);
						}
					}
					$subkey++;
				}	
				
			}
		}
	}
	
	public function getTree(){
		$this->getRoot();
		if($this->level==2) $this->twoLevelsort();
		if($this->level==3) $this->threeLevelsort();
		return $this->tree;		
	}
}

?>