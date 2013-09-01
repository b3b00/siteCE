<?php

	echo "<div id='column'>"; 
	include('./custom/stream.php');
	
	echo "<div class='conteneur block' style='padding-left:15px;background:#ffffff'>";
		echo"<form method='post' action='index.php?page=search' ><input type='text' name='search' id='search'/>";
		echo "<input type='image' src='images/find.png' inclick='this.form.submit();'/>";
		//		echo"<input type='submit' name='Chercher' value='chercher'/>";
		echo"</form>";
		

global $map;
global $config;
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
			
$item = Page::get($map,$page);
$content = "";

if (isset($item)) {	
		$content = $item->getContent(); 
		echo "<div id='content'  style='background:#ffffff'>";
		if (!$item->isNode()) {		

				
				include($item->getContentFileName());		
						
			}
 }
 if (!$item || $item->getId() == 'home') {
	include('home.php');
}
 if ($item && $item->getId() == 'search') {
	include('search.php');
}

echo "</div></div></div>";
?>