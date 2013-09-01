<?php
require_once('common/tools.php');
require_once('common/config.php');
require_once('common/page.php');
require_once('common/news.php');
require_once('back/importPrices.php');

$config = new Config("config/conf.cfg");
$encoding = $config->getProperty('encoding');
header("Content-Type: text/html; charset=".$encoding);


$logged = checkLogin();
//echo "<b>is logged ? ".$logged."</b><br/>";

if ($logged !== 0) {	
	$toDisplay = 'back/admin.php';	
}
else {
	include( 'back/loginAdmin.php');
	return;
	exit;
}


$map = array();

	
$map = Page::loadMenu($config);
$_SESSION["MAP"] = $map;

//echo "<b>map loaded</b><br>";

$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else {
	//echo "<b>page param not set</b><br>";
	$page = 'admin';
}

//echo "<b>page(1) == ".$page."</b><br>";

$title = "Administration";
$toDisplay = "";

/********************************************/
/***   controlleur d'action               ***/
/***   pour le backoffice                 ***/
/***                                      ***/
/********************************************/

//echo "<b> PAGE(2) == ".$page."</b><br>";




if ($page == "admin" && !$logged) {
	
	$toDisplay = 'back/loginAdmin.html';
}

if ($page == "doadmin") {
	$title = "Administration";
	$toDisplay = "back/admin.html";
	
}

if ($page == 'displayMedia') {
	include("back/listMedia.php");
	return;
	exit;
}

if ($page == 'displayImage') {
	include("back/listMediaImages.php");
	return;
	exit;
}


if ($page == 'editPrices') {
	include("billeterie/admin/editprices.php");
	return;
	exit;
}

if ($page == 'updatePrice') {
  // echo "going to update a price<br>";
   include("billeterie/admin/updatePrice.php");   
   return;
   exit;
}

if ($page == 'addPrice') {
  // echo "going to add a price<br>";
   include("billeterie/admin/addPrice.php");   
   include("billeterie/admin/editprices.php");
   return;
   exit;
}

if ($page == 'delPrice') {
   //echo "going to delete a price<br>";
   include("billeterie/admin/delPrice.php");   
   include("billeterie/admin/editprices.php");
   return;
   exit;
}



/*********************/
/*     NEWS          */
/*********************/
if ($page == "adminevents") {	
	$title = "Administration des news";
	$toDisplay = "back/adminEvent.php";
	
}
if ($page == "newevent") {	
	$title = "Nouvelle news";
	$toDisplay = "back/newEvent.php";
}
if ($page == "changeevtstate") {		
	News::changeState($config,$_GET["id"]);
	$title = "Administration des news";
	$toDisplay = "back/adminEvent.php";
}
if ($page == "deleteevt") {	
	News::delete($config,$_GET["id"]);
	$title = "Administration des news";
	$toDisplay = "back/adminEvent.php";
}
if ($page == "addevent") {	
	$title = "Administration des news";
	$toDisplay = "back/addEvent.php";
	//include ("back/addEvent.php");
}
/*********************/
/*     MEDIA         */
/*********************/

if ($page == "adminmedia") {
	$title = "Administration des médias";		
	$toDisplay = "back/adminMedia.html";
}
if ($page == "newmedia") {		
	$title = "Administration des médias";
	$toDisplay = "back/adminMedia.php";
}

/*********************/
/*     PAGES         */
/*********************/
if ($page == "adminpages") {
	$title = "administration des pages";
	$toDisplay = "back/adminPage.php";
}
if ($page == "newpage") {
	$title = "Nouvelle page";
	$toDisplay = "back/newpage.php";
}
if ($page == "editpage") {
	$title = "Edition de la page";
	$toDisplay = "back/newpage.php";
}
if ($page == "addpage") {	
	$title = "administration des pages";
	$toDisplay = "back/addNode.php";	
}
if ($page == "delpage") {
	
	Page::deletePage($config,$_GET["id"]);
	global $map;		
	$map = Page::loadmenu($config);
	$_SESSION['MAP'] = $map;
	$title = "administration des pages";
	$toDisplay = "back/adminPage.php";
}
if ($page == "loadprices") {
	global $map;
	loadPrices("d:/xampp/htdocs/cenord/media/Billetterie.csv",$config);	
}



/*********************/
/*     USERS         */
/*********************/

if($page == "user") {	
	$title = "Utilisateurs";	
	$toDisplay = 'back/newuser.php';
}
if($page == "adduser") {	
	//var_dump($_POST);
	addUser($_POST['user'], $_POST['pwd']);
	$title = "Utilisateurs";
	$toDisplay = "back/newuser.php";
}
if($page == "deleteusr") {
	//var_dump($_POST);
	deleteUser($_GET['id']);
	$title = "Utilisateurs";
	$toDisplay = "back/newuser.php";
}
if($page == "logout") {
	logout();
	//echo "<b>logging out</b><br>";
	include('back/loginAdmin.php');
	return;
	exit;
	
}
 //echo "<b>TITLE :: ".$title."</b><br>";
 //echo "<b>[1]&nbsp;:&nbsp;".$toDisplay."</b><br>";


if (isset($toDisplay) && strlen($toDisplay) >0 && $logged) {
	//echo "<b>[2]&nbsp;:&nbsp;".$toDisplay."</b><br>";
	include('back/adminhead.php');
	
	include($toDisplay);
}
else if (!$logged) {
	include("back/loginAdmin.php");
}



?>		