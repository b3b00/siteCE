<?php

require_once('common/tools.php');
require_once('common/config.php');
require_once('common/page.php');



$config = new Config("config/conf.cfg");
$encoding = $config->getProperty('encoding');
header("Content-Type: text/html; charset=".$encoding);

if (isMobile($config) ) {
//if (isMobile() ) {
//echo "<b>going mobile</b><br>";
	include("custom/mobile/mobile.php");
	return ;
	exit;
}

$map = array();
if  (isset($_SESSION["MAP"])) {
	$map = $_SESSION["MAP"];
}
else {	
	$map = Page::loadMenu($config);
	$_SESSION["MAP"] = $map;
}

$page = "";

if (isset($_GET['page'])) {
	
	if ($_GET['page'] == "billetterie") {
		include("billetterie/prices.php");
		exit;
		return;
	}
	if ($_GET['page'] == "doCommand") {
		include("billetterie/doCommand.php");
		exit;
		return;
	}	
	$page = $_GET['page'];
}
else {
	$page = 'home';
}




// on cherche la page dans le menu

$item = Page::get($map,$page);
	if (!isset($item)) {
		// si elle n'existe pas on recharge le menu par précaution (cas d'une news ajoutée Ã  l'instant)
		$map = Page::loadmenu($config);
		$_SESSION['MAP'] = $map;
		$item = Page::get($map,$page);
	}
	include("custom/layout.php");

?>
