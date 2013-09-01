<?php
	
	require_once("common/config.php");
	require_once("common/price.php");
	require_once("Smarty/libs/Smarty.class.php");
	
	$smarty = getSmarty();



$label = $_GET['label'];
$cat = $_GET['cat'];	
$info = $_GET['info'];
$price = $_GET['price'];	


$config = new Config("config/conf.cfg");
$prices = Price::addPrice($config,$label,$info,$cat,$price);

//
// update manifest version
//


$date = new DateTime();

$fp = fopen("billetmanifest.txt", "w");


fputs ($fp, "CACHE MANIFEST\n");
fputs ($fp, "# random string of digits, preferably a version or timestamp\n");
fputs ($fp, $date->getTimestamp()."\n");
fputs ($fp, "# cached static resources\n");
fputs ($fp, "CACHE:\n");
fputs ($fp, "index.php\n");
fputs ($fp, "js/jquery-1.8.1.min.js\n");
fputs ($fp, "js/jquery.uitablefilter.js\n"); 
fputs ($fp, "images/false.gif\n");


fputs ($fp, "NETWORK:\n");
fputs ($fp, "# resources to always serve from the network\n");
fclose($fp);  


?>