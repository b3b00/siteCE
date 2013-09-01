<?php
 
require_once('common/tools.php');
require_once('common/config.php');

class CommandLine {
	
	var $id = -1;	
	var $idCommand;
	var $idItem;
	var $label;
	var $unitaryPrice;
	var $quantity;
	

	
	function CommandLine($id, $idCommand, $idItem, $label, $unitaryPrice, $quantity) {
		$this->id = $id;
		$this->idCommand = $idCommand;
		$this->idItem = $idItem;
		$this->label = $label;
		$this->unitaryPrice = $unitaryPrice;
		$this->quantity = $quantity;
	}
	
	
	
	
	
	function getId() {	
		return $this->id;
	}
	
	function setId() {
		$this->id = $id;
	}
	
	
	function getIdCommand() {	
		return $this->idCommand;
	}
	
	function setIdCommand() {
		$this->idCommand = $idCommand;
	}
	
	function getIdItem() {	
		return $this->idItem;
	}
	
	function setIdItem() {
		$this->idItem = $idItem;
	}
	
	
	function getLabel() {
		return $this->label;
	}
	
	function setLabel($label) {
		$this->label = $label;
	}
	
	function getUnitaryPrice() {
		return $this->unitaryPrice;
	}
	
	function setUnitaryPrice($unitaryPrice) {
		$this->unitaryPrice = $unitaryPrice;
	}
	
	function getQuantity() {
		return $this->quantity;
	}
	
	function setQuantity($quantity) {
		$this->quantity = $quantity;
	}
	
	
	
	
	
	function save($config) {
		connectDB($config);
		$keywordsStr = "";
		
		$mysqldate = date( 'Y-m-d H:i:s');;
		$query = "insert into lignedecommande(idCommande, idItem, quantity) values('".$this->idCommand."',".$this->idItem.",".$this->quantity.")";
		//echo "<b>$query</b><br>";
		$result = mysql_query($query);
		if ($result) {		
		}
		else {
		}		

	}
	
	
	
	static function readLineFromRow($row) {
		$id = $row["id"];
		$idCommand = $row["idCommande"];
		$idItem = $row["idItem"];
		$label = $row["label"];
		$price = $row["price"];
		$quantity = $row["quantity"];
		return new CommandLine($id, $idCommand, $idItem, $label, $price, $quantity);
	}
	
	
	static function loadForCommande($config, $idCommande) {
				connectDB($config);
		$query="select l.id, l.idCommande, l.idItem, l.quantity, p.label, p.price from lignedecommande l join price p ".
			" on l.iditem=p.id where l.idCommande='".$idCommande."'";
			//echo "<b>$query</b><br>";
		$result = mysql_query($query);
		$lines = array();
		if ($result) {
			while ($row = mysql_fetch_assoc($result)) {
				$line = CommandLine::readLineFromRow($row);
				$lines[] = $line;	
			}
		}
			return $lines;
	}
	
}


?>