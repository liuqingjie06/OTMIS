<?php

namespace Acme\TryBundle\TreeClass;

class Tree {
	
	public $id;
	public $key;
	public $arr;
	
	public function __construct($id,$key){
		
		$this->id=$id;
		$this->key=$key;
		$this->arr=array();
	}
}

?>