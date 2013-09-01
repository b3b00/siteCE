	

<?php


require_once("common/tools.php");
require_once("common/page.php");
require_once("common/news.php");

global $config;
global $map;

//var_dump($_POST);


$map = array();
if  (isset($_SESSION["MAP"])) {
	$map = $_SESSION["MAP"];
}
else {
	$map = loadMenu("root","root","cenord");
	$_SESSION["MAP"] = $map;
}


// var_dump($_POST);
// var_dump($_FILES);

// error("no error");

/*
if (!(isset($_POST["identifier"]) && strlen($_POST["identifier"]))) {
	error("le champ ID doit etre rempli");
}*/

// isset($_POST["identifier"]) && strlen($_POST["identifier"]) > 0 &&
if ( 
	isset($_POST["descr"]) && strlen($_POST["descr"]) > 0) {
	
	$identifier = generateId($_POST["descr"]);
	
	if (News::get($config, $identifier)) {
		error("la news ".$identifier." existe dÃ©jÃ ");
	}
		
	$id = $identifier;
	$descr = $_POST["descr"];	
	$content = $_POST["rteContent"];	
	$annonce = $_POST["rteNews"];	
	$target = $_POST["target"];
	$active = (isset($_POST["active"]) && $_POST["active"]=='on')?1:0;	
			  //News($id, $descr, $active, $announce, $content, $target, $rank                    ,$date)
	$news = new News( $id, $descr, $active, $annonce, $content, $target, News::getMaxRank($config),"");
	
	$news->saveOrUpdate($config);
	
	include('adminEvent.php');
}
else {
	error("erreur dans le formulaire");
}




function error($msg) {
	echo "<div id='content' style='margin-top:150px;display:block'>";
	echo "<div class='conteneur' style='display:block'>";
	echo "<b style='color:red'>".$msg."</b><br>";
	echo "<br><a href='admin.php?page=adminevents'>retour</a><br>";
	echo "</div></div></body></html>";
	die;
}

?>

</div></div></body></html>