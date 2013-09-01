<?php


require_once("common/tools.php");
require_once("common/page.php");

?>

		
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block'>
				
<?php
//print_r($_POST);
$map = array();
if  (isset($_SESSION["MAP"])) {
	$map = $_SESSION["MAP"];
}
else {
	global $config;
	$map = Page::loadMenu($config);
	$_SESSION["MAP"] = $map;
}

if (    isset($_POST["parent"])  && 
	  isset($_POST["descr"]) && strlen($_POST["descr"]) > 0 ) {
	$id = $_POST["id"];
	$parent = $_POST["parent"];	
	$descr = $_POST["descr"];	
	$id = strlen($_POST["id"]) > 0 ? $_POST["id"] : null;
	if (!isset($id)) {
		$id = generateId($descr);
	}
	$mobile = (isset($_POST["mobile"]) && $_POST["mobile"]=='on')?1:0;	
	$node = (isset($_POST["node"]) && $_POST["node"]=='on')?1:0;	
	$active = (isset($_POST["active"]) && $_POST["active"]=='on')?1:0;
	
	$content = isset($_POST["content"]) ? $_POST["content"] : "";
	
	
	
	$content = preg_replace('/\\\/','',$content,-1);
	
	global $config;
	
	connectDB($config);
	
	$father = Page::get($map,$parent);
	
	if ($father || strlen(trim($parent)) == 0)	 {
		
//		echo "father found :: ".$father->getDescr()."<br>";
	
		$depth = $father ? $father->getDepth() +1 : 0;
		$rank = $father ? $father->countchildren() : 0;
		
		$page = new Page($id,$descr,$parent,$rank,$depth,$mobile,$node,$active);
		$page->setContent($content);
		
		foreach($_POST as $id=>$value) {		
			if (startsWith($id,"keyword") && strlen($value) > 0) {
//				echo "<b>KEYWORD [".$id."::".$value."]</b><br>";
				$page->addKeyword($value);			
			}
		}
		//var_dump($page->getKeywords());
		
		
		//echo "<br>calling saveorupdate<br>";
		$page->saveOrUpdate($config);
		//insertOrUpdatePage($config,$id,$descr,$parent,$depth,$rank,$content);
		
		
		
		
		
		echo "<br>OK!!<br>";
		echo "<br><a href='admin.php?page=adminpages'>retour</a><br>"; 

		$map = Page::loadMenu($config);
		$_SESSION['MAP'] = $map;
	}	
	else {	
		error("le parent [".$parent."] n'existe pas");		
	}
}
else {
	error("erreur dans le formulaire");
	//var_dump($_POST);
}


function error($msg) {
	echo "<b style='color:red'>".$msg."</b><br>";
	echo "<br><a href='admin.php?page=adminpages'>retour</a><br>";
}



?>

</div></div>
</body></html>