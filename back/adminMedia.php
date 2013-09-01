<?php


require_once("common/tools.php");

global $config;
global $map;


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




		
deployMediaFiles();

function deployMediaFiles() {
	// echo "<b>deploying media files</b><br>";
	$count = 0;
	foreach($_FILES as $id=>$f) {		
		if (startsWith($id,"mediafile") && strlen($f["name"]) > 0) {
			// echo "<b>deploying media file to "."./media/".$f["name"]."</b><br>";
			$deployed = copy($f["tmp_name"],"./media/".$f["name"]);
			if ($deployed) {
				$count ++;
			}			
		}
	}
	echo $count." media file".(($count > 1) ?"s were ":" was")." deployed<br>";
	echo "<a href='admin.php?page=adminmedia'>retour</a><br>";
}




?>