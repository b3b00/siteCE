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
class Commande {
	
	var $id = -1;	
	var $date;
	var $client;
	var $state;
	var $lines;
	

	
	function Commande($id, $client, $date, $state) {
		$this->id = $id;
		$this->client = $client;
		$this->date = $date;
		$this->state = $state;
	}
	
	
	
	
	
	function getId() {	
		return $this->id;
	}
	
	function setId($id) {
		$this->id = $id;
	}
	
	function getClient() {
		return $this->client;
	}
	
	function setClient($client) {
		$this->client = $client;
	}
	
	function getDate() {
		return $this->date;
	}
	
	function setDate($date) {
		$this->date = $date;
	}
	
	function getState() {
		return $this->state;
	}
	
	function setState($state) {
		$this->state = $state;
	}
	
	function getLines() {
		return $this->lines;
	}
	
	function setLines($lines) {
		$this->lines = $lines;
	}
	
	function getPrice() {
		$price = 0;
		foreach ($this->lines as $l) {
			$price = $price+ $l->getUnitaryPrice() * $l->getQuantity();
		}
		return $price;
	}
	
	
	function save($config) {
		connectDB($config);
		$keywordsStr = "";
		
		$mysqldate = date( 'Y-m-d H:i:s');
		$id = Commande::getNewId($config);
		$query = "insert into commande(id,client,date,state) values('".$id."','".addslashes ($this->client)."','".$mysqldate."','".addslashes ($this->
state)."')";
		//echo "<b>$query</b><br>";
		$result = mysql_query($query);
		if ($result) {
			return $id;
			//return 0;
		}
		else {
			return -1;
		}		

	}
	
	function update($config) {
		connectDB($config);	
		
		$query = "update commande set 	state='".$this->state."', client='".$this->client."' 													
							where id='".$this->id."'";		
		//echo "<br><b>QUERY".$query."</b><br>";
		$result = mysql_query($query);
		if ($result) {		
		}
		else {
		}		
	}
	
	function exists($config) {
		connectDB($config);
		$exists = false;
		$search = "select * from commande where id='".$this->getId()."'";
		$res = mysql_query($search);
		if ($res) {
			while ($row = mysql_fetch_assoc($res)) {
				$exists = isset($row['id']);
			}
		}
		else {				
			//echo $search." :: ".mysql_error()."<br>";
		}
		return $exists;
		return false;
		
	}
	
	function saveOrUpdate($config) {
		if ($this->exists($config)) {
			$this->update($config);
		}
		else {
			$this->save($config);
		}
		
	}
	
	static function readCommandeFromRow($row) {
		$id = $row["id"];
		$client = $row["client"];
		$date = $row["date"];
		$state = $row["state"];
		return new Commande($id, $client, $date, $state);
	}
	
	
	static function loadLines($command, $config) {
		$lines = CommandLine::loadForCommande($config, $command->getId());
		$command->setLines($lines);
		return $command;
	}
	
	
	
	static function loadAll($config) {
		connectDB($config);
		$query="select c.id, c.client, c.date,c.state from commande c order by date, state;";
		$result = mysql_query($query);
		$commands = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$cmd = Commande::readCommandeFromRow($row);
				$cmd = Commande::loadLines($cmd,$config);
				if (isset($commands[$cmd->getState()]) && $commands[$cmd->getState()] != null && is_array($commands[$cmd->getState()])) {
					
				}
				else {
					$commands[$cmd->getState()] = array();
				}
				$commands[$cmd->getState()][] = $cmd;
				
			}
		}
		return $commands;
	}
	
	
	static function loadById($config,$id) {
				connectDB($config);
		$query="select c.id, c.client, c.date,c.state from commande c where c.id='".$id."' order by date, state;";
		//echo "<b>$query</b><br>";
		$result = mysql_query($query);
		$command = null;
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$cmd = Commande::readCommandeFromRow($row);
				$cmd = Commande::loadLines($cmd,$config	);
				if (isset($commands[$cmd->getState()]) && $commands[$cmd->getState()] != null && is_array($commands[$cmd->getState()])) {
					
				}
				else {
					$commands[$cmd->getState()] = array();
				}
				$command = $cmd;
				
			}
		}
		return $command;
	}
	
	static function generateId() {
		srand( (double)microtime()*rand(1000000,9999999) ); // Genere un nombre aléatoire
		$arrConsonne = array('B','C','D','F','G','H','K','L','M','N','P','Q','R','S','T','V','W','X','Z'); 
		$arrVoyelle = array('A','E','I','O','U','Y'); 
		
		$uId = "";
		
		
		$uId .= $arrConsonne[rand( 0, count( $arrConsonne )-1 )]; 
		$uId .= $arrVoyelle[rand( 0, count( $arrVoyelle)-1 )]; 
		$uId .= $arrConsonne[rand( 0, count( $arrConsonne)-1 )]; 
		$uId .= $arrVoyelle[rand( 0, count( $arrVoyelle )-1 )]; 
		$uId .= $arrConsonne[rand( 0, count( $arrConsonne )-1 )]; 
		$uId .= $arrVoyelle[rand( 0, count( $arrVoyelle )-1 )]; 
		
		return $uId;
	}
	
	static function getNewId($config) {
		$db = connectDB($config);
		$q="select c.id from commande c where c.id='";
		$id = Commande::generateId();
		$query = $q.$id."'";
		$result = mysql_query($query, $db);
		
		$n = mysql_num_rows($result);
		while($n != 0) {
			$id = Commande::generateId();
			$query = $q.$id."'";
			$result = mysql_query($query, $db);			
			$n = mysql_num_rows($result);
		}	
		return $id;
	}
	
	
}


?>