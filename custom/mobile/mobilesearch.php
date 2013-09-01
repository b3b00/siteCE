<?php

require_once('common/tools.php');
require_once('common/news.php');

echo "<h1>SEARCH</h1>";

global $config;

$search = isset($_POST['search']) ? $_POST['search'] : "";
$search = htmlentities($search,ENT_COMPAT,'UTF-8');
//$search = htmlentities($_POST["search"],ENT_COMPAT,$encoding);
$encoding = $config->getProperty("encoding");
// echo $search."<br>";
// echo html_entity_decode ($search)."<br>";

$result = Page::search($config,$search);

if (count($result)==0) {
	echo "<h2> pas de résultat </h2>";
}
else {
	echo "<h2> Résultats </h2>";
	echo "<ul data-role='listview' >";
	foreach($result as $page) {
		if (isset($page) && !is_null($page) && $page->isMobile()) {
			echo "<li><a data-transition='flip' href='index.php?page=".$page->getId().getMobileParam()."'>".$page->getDescr()."</a></li>";
		}
	}	
	echo "</ul>";
}

?>