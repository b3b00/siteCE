<?php
header('content-type','application/atom+xml');
require_once('common/tools.php');
require_once('common/news.php');
global $config;
$events = News::getAllActive($config);
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<feed xmlns='http://www.w3.org/2005/Atom'>";
echo "<title>news CE Logica Nord</title>";


foreach ($events as $e) {
$p = new Page($e->getid(),"","","","");
	echo "<entry>";
	echo "<title>".$e->getDescr()."</title>";
	
	if ($p->exists($config)) {	
		echo "<link href='index.php?page=".$e->getId()."'/>";
	}
	else {
		echo "<h2>".$e->getDescr()."</h2>";
	}
	echo "<summary>".$e->getAnnounce()."</summary>";
	echo "</entry>";
}
echo "</feed>";

?>