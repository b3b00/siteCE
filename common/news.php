<?php

require_once('common/tools.php');
require_once('common/config.php');

class News {

	var $id;
	var $descr;
	var $active;
	var $announce;
	var $rank;
	var $content;
	var $target;
	var $date;
	
	function News($id, $descr, $active, $announce, $content, $target,  $rank, $date) {
		$this->id = $id;
		$this->descr = $descr;
		$this->active = $active;
		$this->announce = $announce;		
		$this->target = $target;
		$this->rank = $rank;
		$this->content = $content;
		$this->date = $date;
	}
	
	function getAnnounceFileName() {
		return "news/".$this->getId().".dat";
	}
	
	function getId() {
		return $this->id;
	}
	
	function getDescr() {
		return $this->descr;
	}
	
	function getAnnounce() {
		return $this->announce;
	}
	
	function setAnnounce($announce) {
		$this->announce = $announce;
	}
	
	
	function getRank() {
		return $this->rank;
	}
	
	function isActive() {
		return $this->active;
	}
	
	function getDate() {
		return $this->date;
	}
	
	function hasContent($config) {
		$p = new Page($this->getid(),"","","","",1,1,1);
		return $p->exists($config);
	}
	
	static function getMaxRank($config) {
		$max = 0;
		connectDB($config);
		$query="select max(rank) as mx from event";
		//	echo "<b>".$query."</b><br>";
		$result = mysql_query($query);
		if ($result) {
			
			while ($row = mysql_fetch_assoc($result)) {
				$max = $row['mx'];				
			}
		}
		else {
			//echo "<b>".mysql_error()."</b><br>";
		}
		return $max+1;
	}
	
	
	function saveAnnounce() {
		$f = $this->getAnnounceFileName();
		//echo ("<b>save announce to ".$f."/<b><br>");
		file_put_contents($f,$this->getAnnounce());	
	}
	
	function loadAnnounce() {		
		$f = $this->getAnnounceFileName();
		if (file_exists($f)) {
			$content = file_get_contents($f);
			$this->setAnnounce($content);
		}
	}
	
	/**************************************************/
	
	function save($config) {
		connectDB($config);
		//$d = $this->date
		$mysqldate = date( 'Y-m-d H:i:s');;
		$query = "insert into event(id, description, rank, active,  updated) values ";
		$rank = News::getMaxRank($config);
		// echo "<b>RANK == ".$rank."</b><br>";
		$query .= "('".$this->id."','".addslashes($this->descr)."',".$rank.",".$this->active.",'".$mysqldate."')";
		//echo "<b>".$query."</b><br>";
		$result = mysql_query($query);
		
		if ($result) {
		}
		else {
			echo "<br>".mysql_error()."</b>";
		}

		if (strlen($this->content) > 0) {
			$page = new Page($this->id,$this->descr,$this->target,0,1,1,0,$this->active);					
			$page->setContent($this->content);
			$page->saveOrUpdate($config);	
		}
	}
	
	
	function update($config) {
		connectDB($config);	
	
	}
	
	function exists($config) {
	
	}
	
	function saveOrUpdate($config) {
		if ($this->exists($config)) {
			$this->update($config);
		}
		else {
			$this->save($config);
		}
		//echo "<b>will save announce ?</b><br>";
		$this->saveAnnounce();
	}
	
	
	/*****************************************************/
	
	
	 static function getAllActive($config) {
		 connectDB($config);
		$query="select id, description,  rank, active,  updated	 from event where active=1 order by   updated desc, active asc, rank";
		//echo "\n\n".$query."\n\n";
		$result = mysql_query($query);
		$events = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				//print_r($row);
				$n = new News($row['id'],$row['description'],$row['active'],'','','',$row['rank'],$row['updated']);
				$n->loadAnnounce();
				$events[] = $n;
				
			}
		}
		
		return $events;
	 }
 
 
	 static function getAll($config) {
		 connectDB($config);
		$query="select id, description, rank, active, updated from event order by  active desc, rank asc";
		$result = mysql_query($query);
		$events = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				         //News($id, $descr, $active, $announce, $content, $target,  $rank, $date)
				$n = new News($row['id'],$row['description'],$row['active'],'','','',$row['rank'],$row['updated']);
				$events[] = $n;
			}
		}
		else {
			
		}
		
		return $events;
	 }
	 
	 static function get($config, $id) {
		$news = null;
		connectDB($config);
		$query="select id, description, rank, active, annonce from event where id='".$id."'";
		$result = mysql_query($query);
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$news = new News($row['id'],$row['description'],$row['active'],$row['annonce'],'','',$row['rank']);
				
			}
		}
		return $news;
	 }
	
	 
	 static function inactive($config,$id) {
		// echo("inactive evt ".$id."<br>");
		connectDB($config);
		$query = "update event set active=0 where id='".$id."'";
		$result = mysql_query($query);
		if ($result) {
		}
		else {
			echo "<br>".mysql_error()."</b>";
		}
	 }
	 
	 static function active($config,$id) {
		// echo("active evt ".$id."<BR>");
		connectDB($config);
		$query = "update event set active=1 where id='".$id."'";
		$result = mysql_query($query);
		if ($result) {
		}
		else {
			echo "<br>".mysql_error()."</b>";
		}
	 }
	 
	 
	 static function changeState($config,$id) {
		connectDB($config);
		$evt = News::get($config,$id);
		if ($evt->isActive() == 1) {
			News::inactive($config,$id);
		}
		else {
			News::active($config,$id);
		}
	 }
 
	  static function delete($config,$id) {
		connectDB($config);
		$query = "delete from event  where id='".$id."'";
		$result = mysql_query($query);
		if ($result) {
			Page::deletePage($config,$id);
		}
		else {
			echo "<br>".mysql_error()."</b>";
		}
	 }
	 
 
 
	
	
}
?>
