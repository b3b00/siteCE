<?php

require_once('common/tools.php');
require_once('common/config.php');
require_once('common/page.php');

$config = new Config("config/conf.cfg");
$encoding = $config->getProperty('encoding');
header("Content-Type: text/html; charset=".$encoding);

global $title;
global $page;
//echo "mobile.php:: enter<br>";
$map = array();
if  (isset($_SESSION["MAP"])) {
	//echo "mobile.php:: getting map from session<br>";
	$map = $_SESSION["MAP"];
}
else {	
	//echo "mobile.php:: loading map<br>";
	$map = Page::loadMenu($config);
	$_SESSION["MAP"] = $map;
}

$page = "";
if (isset($_GET['page'])) {
	
	$page = $_GET['page'];
	//echo "mobile.php:: page param is set = ".$page."<br>";
	
}
else {
	//echo "mobile.php:: page param not set = home<br>";
	$page = 'home';
	$title = "CE CGI Nord";
}



//echo "<b>PAGE :: ".$page."</b><br>";

// on cherche la page dans le menu


if ($page !== 'home') { 
	//echo "mobile.php:: page != home<br>";
	$item = Page::get($map,$page);
	$title = $item->getDescr();
	//echo "mobile.php:: title == ".$title."<br>";
	
}
else {
	$item = $map;
}
echo "<!-- mobhead -->";
include ('custom/mobile/mobilehead.php');

	if (!isset($item) ) {
		// si elle n'existe pas on recharge le menu par précaution (cas d'une news ajoutée à  l'instant)
		//echo "mobile.php:: page not found reloading map<br>";
		$map = Page::loadmenu($config);
		$_SESSION['MAP'] = $map;
		$item = Page::get($map,$page);
		//echo "mobile.php:: after map reload item is [".$item->getDescr()."] <br>";
		
	}
	
	if ($page == 'search') {
	
		include('custom/mobile/mobilesearch.php');
		return;
		exit;
	}
	if ($page== 'home' || $item->isNode()) {
		echo "<!--mobmenu-->";
		include("custom/mobile/mobilemenu.php");
		
	}
	else {
		//echo "mobile.php:: including mobilepage.php<br>";
		include("custom/mobile/mobilepage.php");
	}
	include("custom/mobile/mobilefooter.php");

?>