<?php
require_once('common/tools.php');
require_once('config.php');

$config = new Config("config/conf.cfg");

var_dump($config);

$map = loadMenu($config);


function getFileContent($file) {
	if (!is_array($file) && endswith($file,".html")) {
		$handle = fopen("pages/".$file, "r");
		$contents = fread($handle, filesize("pages/".$file));
		fclose($handle);
		echo $contents;
		return $contents;
	}
}

function migrate($page) {
	global $config;
	$content = getfileContent($page['content']);
	$file = $page['content'];
	if (is_array($file)) {
		$file = "";
	}
	insertOrUpdatePage($config,$page['id'],$page['descr'],$page['parent'],$file ,$page['depth'],$page['rank'],$content);		
	if (is_array($page['content']) && count($page['content']) > 0) {
		foreach ($page['content'] as $id => $p) {
			migrate($p);
		}
	}
}





foreach($map as $id => $page) {
	migrate($page);
}





	


?>