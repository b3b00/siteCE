<?php
 
require_once('common/tools.php');
require_once('common/config.php');

define ("KEYWORD_SEPARATOR",";");

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
	
	function Page($id, $descr, $parent, $rank, $depth, $mobile) {
		$this->id = $id;
		$this->descr = $descr;
		$this->parent = $parent;
		$this->rank = $rank;
		$this->depth = $depth;		
		$this->keywords = array();
		$this->mobile = $mobile;
	}
	
	function setMobile($mobile) {
		$this->mobile = $mobile;
	}
	
	function isMobile() {
		return $this->mobile;
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
	
	function isNode() {
		return is_array($this->children) || strlen($this->content) == 0; 
	}
	
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
		
		$query = "insert into map(id,description,parent,depth,rank, keywords,mobile) values('".$this->id."','".addslashes ($this->descr)."','".addslashes ($this->parent)."',".$this->depth.",".$this->rank.",'".$keywordsStr."',".$this->mobile.")";
		// echo "<br>".$query."<br>";
		$result = mysql_query($query);
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
							content='".addslashes($this->content)."' ,
							parent='".$this->parent."' ,
							keywords='".$keywordsStr."' ,
							mobile=".$this->mobile."
							where id='".addslashes($this->id)."'";		
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
		if ($this->exists($config)) {
			$this->update($config);
		}
		else {
			$this->save($config);
		}
		$this->saveContent(); 
	}
	
	function saveContent() {
		$f = "content/".$this->getId().".dat";
		file_put_contents($f,$this->getContent());	
	}
	
	function loadContent() {		
		$f = "content/".$this->getId().".dat";
		if (file_exists($f)) {
			$content = file_get_contents($f);
			$this->setContent($content);
		}
	}
	
	
	/*****************************************************/
		
		
	static private function readPageFromRow($row) {
		$page = new Page($row["id"], $row["description"],$row["parent"], $row['rank'],$row['depth'],$row['mobile']);
		//$page->setContent($row['content']);
		$keywordsStr = $row['keywords'];
		//echo "<b>found keywords string == [".$keywordsStr."]</b><br>";
		$keywords = (preg_split("/".KEYWORD_SEPARATOR."/",$keywordsStr));
		//echo "<b>found keywords array <br>";
		// var_dump($keywords);
		// echo "</b><br>";
		$page->setKeywords($keywords);
		$page->loadContent();
		return $page;
	}	
		
	static function loadMenu($config) {
		connectDB($config);
		$query="select m.id, m.description, m.content, m.parent,m.depth, m.rank, m.keywords, m.mobile from map m where m.id not in (select id from event where active=0) order by depth, rank;";
		$result = mysql_query($query);
		$map = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				if ($row["content"] !== NULL) {		
					$page = Page::readPageFromRow($row);				
				}
				else {					
					$page = readPageFromRow($row);					
				}
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
			$query="SELECT id, description, content, parent,depth, rank, keywords, mobile FROM map WHERE content LIKE '%".$search."%' OR keywords LIKE '%".$search."%' ";
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