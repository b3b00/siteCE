<?php


function displayItemStyle($page,$item,$i) {
	
	//echo "<b>".$item->getDescr()." - active:".$item->isActive()." mobile:".$item->isMobile()." </b><br>";
	
		
			
			
			
			echo "div.c$i  {\n";		
				echo "\tbackground-image: url('images/spriteinterro.png') no-repeat;\n";
				echo "\tbackground-repeat: no-repeat;\n";
				echo "\tbackground-position: left top;\n";
			echo "}\n";
			echo "div.c$i:active {\n";
			echo "\tbackground-image: url('images/spriteinterro.png') no-repeat;\n";
			echo "\tbackground-repeat: no-repeat;\n";
			echo "\tbackground-position: -75px top;\n";
			echo "}\n";
			
		
		
	
}


global $map;
global $config;
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
$item = Page::get($map,$page);
if ($page == "") {
	$page = "home";
}
?>

<?

echo " <style type='text/css'>";
if (is_object($item)) { 

	$i = 1;
	foreach($item->getChildren() as $p) {
		displayItemStyle($page,$p,$i);		
		$i++;
	}
	echo "</style>";
}
else {

	//print_r($map);
	?>

 <style type='text/css'>
<?
	echo " /* display menu for page ".$page." */";
	$i = 1;
	foreach($map as $p) {
		if ($p->isMobile() && $p->isActive()) {
			echo "/* ".$p->getDescr()."  $i */\n";
			displayItemStyle($page,$p,$i);		
			$i++;
		}
	}
	echo "</style>";
}


?>