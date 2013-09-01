<?php
 
require_once('common/tools.php');
require_once('common/config.php');

define ("KEYWORD_SEPARATOR",";");
DEFINE("CONTENT_FOLDER","content");
/*
define ("ID_PROPERTY","id");
define ("DESCR_PROPERTY","descr");
define ("DESCR_PROPERTY","parent");
define ("KEYWORDS_PROPERTY","keywords");
*/
class Page {
	
	var $id;
	var $descr;
	var $parent;
	var $content;
	var $children;
	var $rank;
	var $depth;
	var $keywords;
	var $mobile;
	var $isNode;
	var $active;
	

	
	function Page($id, $descr, $parent, $rank, $depth, $mobile, $node, $active) {
		$this->id = $id;
		$this->descr = $descr;
		$this->parent = $parent;
		$this->rank = $rank;
		$this->depth = $depth;		
		$this->keywords = array();
		$this->mobile = $mobile;
		$this->isNode = $node;
		$this->active = $active;
	}
	
	
	
	function getContentFileName() {
		return CONTENT_FOLDER."/".$this->getId().".dat";
	}
	
	
	function setActive($active) {
		$this->active = $active;
	}
	
	function isActive() {
		return $this->active;
	}
	
	function setMobile($mobile) {
		$this->mobile = $mobile;
	}
	
	function isMobile() {
		return $this->mobile;
	}
	
	function isNode() {
		return $this->isNode;
	}
	
	function setNode($isNode) {
		$this->isNode = $isNode;
	}
	
	function setContent($content) {
		$this->content = $content;
	}
	
	
	function setChildren($children) {
		$this->children = $children;
	}
	
	function addChild($page) {
		if ($this->children == NULL) {
			$this->children = array();
		}
		$this->children[] = $page;
	}
	
	/*function isNode() {
		return is_array($this->children)  == 0; 
	}*/
	
	function countChildren() {
		if ($this->isNode() && is_array($this->children)) {
			return count($this->children);			
		}
		return 0;
	}
	
	function getId() {	
		return $this->id;
	}
	
	function getDescr() {
		return $this->descr;
	}
	
	function getParent() {
		return $this->parent;
	}
	
	function getRank() {
		return $this->rank;
	}
	
	function getDepth() {
		return $this->depth;
	}
	
	function getContent() {
		return $this->content;
	}
	
	function getchildren() {
		return $this->children;
	}
	
	function setKeywords($keywords) {
		$this->keywords = $keywords;
	}
	
	function addkeyword($keyword) {
		$this->keywords[] = $keyword;
	}
	
	function getKeywords() {
		return $this->keywords;
	}
	
	
	
	function save($config) {
		connectDB($config);
		$keywordsStr = "";
		foreach ($this->keywords as $k) {
			$cnt = count($this->keywords);
			$i = 0;
			if (strlen($k) > 0) {
				if ($i < $cnt) {
					$keywordsStr .= $k.KEYWORD_SEPARATOR;
				}
				else {
					$keywordsStr .= $k;
				}
			}
		}
		
		$query = "insert into map(id,description,parent,depth,rank, keywords,mobile,node,active) values('".$this->id."','".addslashes ($this->descr)."','".addslashes ($this->parent)."',".$this->depth.",".$this->rank.",'".$keywordsStr."',".$this->mobile.",".$this->isNode.",".$this->active.")";
		//echo "<br><b>".$query."</b><br>";
		//echo "<br<br>".$query."<br><br>";
		$result = mysql_query($query);
		//echo "<b>$query</b><br>";
		if ($result) {		
			// echo "<br>".$id." OK!!<br>";
		}
		else {
			echo("erreur SQL :: ".mysql_error()." pour la requete {".$query."}");
		}		

	}
	
	function update($config) {
		connectDB($config);	
		
		$keywordsStr = "";
		foreach ($this->keywords as $k) {
			$cnt = count($this->keywords);
			$i = 0;
			if (strlen($k) > 0) {
				if ($i < ($cnt-1)) {
					$keywordsStr .= $k.KEYWORD_SEPARATOR;
				}
				else {
					$keywordsStr .= $k;
				}
			}
		}
		
		$query = "update map set description='".addslashes($this->descr)."',							
							parent='".$this->parent."' ,
							keywords='".$keywordsStr."' ,
							mobile=".$this->mobile.",
							node=".$this->isNode.",
							active=".$this->active."
							where id='".addslashes($this->id)."'";		
		//echo "<b>$query</b><br>";
		$result = mysql_query($query);
		if ($result) {		
		}
		else {
			echo("erreur SQL :: ".mysql_error()." pour la requete {".$query."}");
		}		
	}
	
	function exists($config) {
		connectDB($config);
		$exists = false;
		$search = "select * from map where id='".$this->getId()."'";
		$res = mysql_query($search);
		if ($res) {
			while ($row = mysql_fetch_assoc($res)) {
				$exists = isset($row['id']);
			}
		}
		else {				
			echo $search." :: ".mysql_error()."<br>";
		}
		return $exists;
	}
	
	function saveOrUpdate($config) {
		//var_dump($this);
		if ($this->exists($config)) {
			$this->update($config);
		}
		else {
			$this->save($config);
		}
		$this->saveContent(); 
	}
	
	function saveContent() {
		if (strlen($this->getContent()) > 0) {
			$f = $this->getContentFileName();
			file_put_contents($f,$this->getContent());	
		}
	}
	
	function loadContent() {		
		$f = $this->getContentFileName();
		if (file_exists($f)) {
			$content = file_get_contents($f);
			$this->setContent($content);
		}
	}
	
	
	/*****************************************************/
		
	static private function array_flatten($array,$return)
	{
	  for($x = 0; $x < count($array); $x++)
	  {
		if(is_array($array[$x]))
		{
		  $return = array_flatten($array[$x],$return);
		}
		else
		{
		  if($array[$x])
		  {
			$return[] = $array[$x];
		  }
		}
	  }
	  return $return;
	}	
	
		
	static private function searchInPage($page, $search, $result) {
		

	
		if ($page->isNode()) {
			
		}	
		else {
			if (preg_match("/.*".$search.".*/",$page->getContent())) {
				//echo "match : ".$page->getid()."<br>";
				$result[] = $page;
				return array($result);
			}
		}
		return $result;
	}	
		
		
	static private function searchInPages($config, $search) {
		$map = Page::loadMenu($config);
		$contents = scandir(CONTENT_FOLDER);
		$result = array();
		foreach ($contents as $f) {
			if (endsWith($f,'.dat')) {
				$data = file_get_contents(CONTENT_FOLDER."/".$f);	
				if (preg_match("/.*".stripAccents($search).".*/i",stripAccents($data))) {
					$id = str_replace(".dat","",$f);
					$page = Page::get($map,$id);
					$result[] = $page;
				}		
			}
		}
		return $result;
		
	
	
	}	
		
	static private function readPageFromRow($row) {
		$page = new Page($row["id"], stripslashes($row["description"]),$row["parent"], $row['rank'],$row['depth'],$row['mobile'], $row['node'],$row['active']);
		//$page->setContent($row['content']);
		$keywordsStr = $row['keywords'];
		//echo "<b>found keywords string == [".$keywordsStr."]</b><br>";
		$keywords = (preg_split("/".KEYWORD_SEPARATOR."/",$keywordsStr));
		//echo "<b>found keywords array <br>";
		// var_dump($keywords);
		// echo "</b><br>";
		$page->setKeywords($keywords);
		//$page->loadContent();
		return $page;
	}	
		
	static function loadMenu($config) {
		connectDB($config);
		$query="select m.id, m.description, m.parent,m.depth, m.rank, m.keywords, m.mobile, m.node, m.active from map m where m.id not in (select id from event where active=0) order by depth, rank;";
		$result = mysql_query($query);
		$map = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$page = Page::readPageFromRow($row);					
				if ($row["parent"] == NULL) {
					// echo "<b>first level entry :: ".$row['description']."</b><br>";
					$map[] = $page;				
				}
				else {
					// echo "<i>nth level entry :: ".$row['description']."</i><br>";
					$map = Page::addToParent($map, $page);
				}
			}
		}
		else{
				die("load no result :(". mysql_error() ."<br>");
		}
		
		mysql_close();
		return $map;
	
	}
	
	
	
		static function search($config, $search) {
			connectDB($config);
			$search = stripAccents($search);
			$query="SELECT id, description, parent,depth, rank, keywords, mobile, node, active FROM map WHERE  keywords LIKE '%".$search."%' ";
			// echo $query."<br>"; 
			$result = mysql_query($query);			
			$pages = array();
			if ($result) {
				// echo "<br><b>".$query." :: xxx </b><br><br>";
				while ($row = mysql_fetch_assoc($result)) {
					// print_r($row);
					if ($row["id"] != 'search') {
						$page = Page::readPageFromRow($row);
						$pages[] = $page;
					}
				}
			}
			else{
				die("no result :(". mysql_error() ."<br>");
			}
			// echo "<br>found :: ".count($pages)."<br>";
			mysql_close();
			
			$pages2 = Page::searchInPages($config,$search);
			
			foreach($pages2 as $p) {
				if (!in_array($p,$pages)) {
					$pages[] = $p;
				}
			}
			
			return $pages;
	}
	

	static function getMaxDepth($config) {
		connectDB($config);
		$query="select max(depth) as mxDepth from map";
		$result = mysql_query($query);
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				return $row['mxDepth'];
			}
		}
	}


	static function addToParent($map, $page) {
		$i = 0;
		if (is_array($map) && count($map) > 0) {
			foreach ($map as $p) {
				
				if ($p->getId() == $page->getParent()) {
					$p->addchild($page);
					$map[$i] = $p;
					return $map;			
				}
				if ($p->isNode()) {
					$p->setchildren(Page::addToParent($p->getChildren(),$page));
					$map[$i] = $p;
				}
				$i++;
			}
		}
		return $map;
	}
	
	
	static function get($map, $id) {

		foreach ($map as $p) {			
			if ($p->getId() == $id) {			
				return $p;			
			}
			if ($p->isNode() && $p->countChildren() > 0) {
				 $found =  Page::get($p->getChildren(),$id);		
				 if ($found) {
					return $found;
				}
			}
		}
		
		return null;
	}
	
	
	static function deletePage($config,$id) {
		connectDB($config);
		$query = "delete from map where id='".$id."'";
		$result = mysql_query($query);
		if ($result) {
		}
		else {
			echo "<br>".mysql_error()."</b>";
		}
	}
	
}


?>