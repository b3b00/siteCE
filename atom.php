<?php
header("Content-Type:application/atom+xml");

require_once('common/tools.php');

require_once('common/config.php');

require_once('common/page.php');

require_once('common/news.php');

$config = new Config("config/conf.cfg");
$encoding = $config->getProperty('encoding');
//header("Content-Type: application/artom+xml; charset=".$encoding);


global $config;
$events = News::getAllActive($config);
//echo "found :: ";
//print_r($events);
//echo ("\n\n");
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<feed xmlns='http://www.w3.org/2005/Atom'>";
echo "<title>news CE Logica Nord</title>";

//var_dump($_SERVER);

$server = $_SERVER['HTTP_HOST'];
$path = $_SERVER['REQUEST_URI'];
$path = preg_replace("/atom\.php/","",$path);
//echo "<b>".$server.$path."</b><br>";

foreach ($events as $e) {
	$p = new Page($e->getId(),"","","","",1,0);
	echo "<entry>";
	echo "<title>".$e->getDescr()."</title>";
	
	if ($p->exists($config)) {	
		echo "<link href='http://".$server.$path."index.php?page=".$e->getId()."'/>";
	}
	else {
		echo "<h2>".$e->getDescr()."</h2>";
	}
	echo "<updated>".$e->getDate()."</updated>";
	echo "<summary>".$e->getAnnounce()."</summary>";
	echo "</entry>";
}
echo "</feed>";

?>