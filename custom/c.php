<?php
global $map;
global $config;
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
 
$item = Page::get($map,$page);

// print_r($item);
$content = "";
if (isset($item)) {
	//$content = htmlentities($item->getContent(),ENT_QUOTES,$encoding); 
	$content = $item->getContent(); 

		echo "<div id='content'>";
			if (!$item->isNode()) {
			
				if ( substr( $content, strlen( $content ) - strlen( ".html" ) ) === ".html" ) {
					echo "<b>include pages/".$content."</b><br>";
					include("pages/".$content);
				}
				else {
					echo $content;
				}
			 }
			 if ($item->getId() == 'home') {
				include('home.php');
			}
}			
			
		echo "</div></div>";
		




?>