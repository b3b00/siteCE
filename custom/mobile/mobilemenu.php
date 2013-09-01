<?php

function displayItem($item) {
	if ($item->isMobile() && $item->isActive()) { 
		mobilelinkto($item);
		echo "<br>";
	}
}

global $map;
global $config;
$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
$item = Page::get($map,$page);

?>
<p align='center'>
<?php


if (is_object($item)) { 

	foreach($item->getChildren() as $p) {
		displayItem($p);		
	}
	?>
	</p>
<?php
}
else {

	//print_r($map);
	?>

<form action="index.php?page=search<?php echo getMobileParam(); ?>" method="post">
 <input type="search" name="search" id="searc-basic" value="" />
 <form action="form.php" method="post"> </form>
 <p align="center">
<?
	foreach($map as $p) {
		displayItem($p);		
	}
	echo "</p>";
}

?>


