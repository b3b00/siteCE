<?php
 
	require_once("common/config.php");
	require_once("common/price.php");
	require_once("Smarty/libs/Smarty.class.php");
 
	$smarty = getSmarty();
 
 
 
$id = $_GET['id'];
 
 
$config = new Config("config/conf.cfg");
Price::delPrice($config,$id);

?>