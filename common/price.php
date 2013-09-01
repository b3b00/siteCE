<?php
 
require_once('common/tools.php');
require_once('common/config.php');

//define ("KEYWORD_SEPARATOR",";");
//DEFINE("CONTENT_FOLDER","content");
/*
define ("ID_PROPERTY","id");
define ("DESCR_PROPERTY","descr");
define ("DESCR_PROPERTY","parent");
define ("KEYWORDS_PROPERTY","keywords");
*/
class Price {
	
	var $id = -1;
	var $label;
	var $info;
	var $category;
	var $price;
	

	
	function Price($id, $label, $info, $category, $price) {
		$this->id = $id;
		$this->label = $label;
		$this->info = $info;
		$this->category = $category;
		$this->price = $price;		
	}
	
	
	
	
	
	function getId() {	
		return $this->id;
	}
	
	function setId() {
		$this->id = $id;
	}
	
	function getLabel() {
		return $this->label;
	}
	
	function setLabel($label) {
		$this->label = $label;
	}
	
	function getCategory() {
		return $this->category;
	}
	
	function setCategory($category) {
		$this->category = $category;
	}
	
	function getInfo() {
		return $this->info;
	}
	
	function setInfo($info) {
		$this->info = $info;
	}
	
	function getPrice() {
		return $this->price;
	}
	
	function setPrice($price) {
		$this->price = $price;
	}
	
	
	
	
	function save($config) {
		connectDB($config);
		$keywordsStr = "";
		
		
		$query = "insert into price(label,info,category,price) values('".addslashes ($this->label)."','".addslashes ($this->info)."','".addslashes ($this->
category)."',".$this->price.")";

		$result = mysql_query($query);
		if ($result) {		
		}
		else {
		}		

	}
	
	function update($config) {
		connectDB($config);	
		
		
		$query = "update price set 	info='".$this->info."' ,
							price=".$this->price." ,
							category='".$this->category."' ,							
							where label='".addslashes($this->getLabel())."' and info='".addslashes($this->getInfo())."'";		
		$result = mysql_query($query);
		if ($result) {		
		}
		else {
		}		
	}
	
	function exists($config) {
		return false;
		
	}
	
	function saveOrUpdate($config) {
		//var_dump($this);
		if ($this->exists($config)) {
			$this->update($config);
		}
		else {
			$this->save($config);
		}
		
	}
	
	static function readPriceFromRow($row) {
		$id = $row["id"];
		$label = $row["label"];
		$info = $row["info"];
		$cat = $row["category"];
		$price = $row["price"];
		return new Price($id,$label,$info,$cat,$price);
	}
	
	
	
	static function loadAll($config) {
				connectDB($config);
		$query="select p.id, p.label, p.info,p.category, p.price from price p order by category, label , info;";
		$result = mysql_query($query);
		$prices = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$price = Price::readPriceFromRow($row);
				if (isset($prices[$price->getCategory()]) && $prices[$price->getCategory()] != null && is_array($prices[$price->getCategory()])) {
					
				}
				else {
					$prices[$price->getCategory()] = array();
				}
				$prices[$price->getCategory()][] = $price;
			}
		}
			return $prices;
	}

	static function updatePrice($config, $id, $price) {
	       connectDB($config);	
	       $query = "update price p  set p.price=".$price." where p.id='".$id."'";		
		$result = mysql_query($query);
		if ($result) {	
		    echo"<b style='color:red'>all done OK</b><br>";	
		}
		else {
		 echo"<b style='color:red'>". mysql_error($result)."</b><br>";	
		}
	}


static function addPrice($config,$label,$info,$cat,$price) {
   $price = new Price(0, $label, $info, $cat, $price);
   connectDB($config);	
   $price->save($config);
}

static function delPrice($config,$id) {
   $price = new Price(0, $label, $info, $cat, $price);
   connectDB($config);	
 $query = "delete from price where id='".$id."'";		
		$result = mysql_query($query);
}

static function clearAll($config) {
		connectDB($config);
		$query="delete from price";
		$result = mysql_query($query);
	}
	
}


?>					