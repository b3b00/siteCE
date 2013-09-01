<?php
require_once("common/tools.php");
require_once("common/news.php");

global $map;
global $config;

function displayItems($map) {
	echo "<p align='center'>";
	foreach ($map as $item) {
			displayItem($item);
	}
	echo "</p>";
}

function displayItem($item) {
	if ($item->isMobile()) {
		if ($item->isNode()) {
			echo "<a align='center' href='#".$item->getId()."' data-role='button' data-inline='true'>".$item->getdescr()."</a>\n<br>\n";
		}
		else {
			echo "<a align='center' href='index.php?page=".$item->getId()."' data-role='button' data-inline='true'>".$item->getdescr()."</a>\n<br>\n";
		}
	}
}

function displayBegin($page, $title) {
	echo "<div data-role='page' id='".$page."' >\n"	;
	echo "<div data-role='header' data-theme='d'>\n";
	if ($page !== 'home' ) { 
		echo "<a data-role='button' data-icon='home' data-iconpos='notext' href='#home' data-inline='true'/>";
		echo "<a data-rel='back' data-inline='true' data-icon='arrow-l'>back</a>\n";
	}
	echo "<h1>".$title."</h1>\n";
	echo "</div>\n";
	
}


function displayEnd($page) {

echo "<div data-role='footer' data-theme='d'> ";
if ($page == 'home') {
	global $config;
	$events = News::getAllActive($config);	
	$e = $events[0];
	if (isset($e)) {
	
		echo "<h4 align='center' style='text-decoration:none;border-bottom:1px dashed black; '>EN CE MOMENT</h4>";
		echo "<h5 align='center'><a href='index.p*hp?page=".$e->getId()."'>".$e->getDescr()."</a></h5>";
		echo "<div align='center' style='text-align:center'>".$e->getAnnounce()."</div>";
	}
}
echo '&nbsp;';
echo "</div>";

}



function displayBeginPage($id) {
	
}

function display($page,$title,$children) {
	if (count($children)> 0) {
		displayBegin($page,$title);
		echo "<div data-role='content' >\n";
		if ($page == 'home') {
			echo "<form action='index.php?page=search' method='post'>\n";
			echo "<input type='search' name='search' id='search-basic' value='' />\n";
			echo "</form>\n"; 
		}
		
		displayItems($children);
		echo "</div>\n";
		displayEnd($page);
		echo "</div>\n";
		
		
		foreach ($children as $item) {
			display($item->getId(),$item->getDescr(),$item->getChildren());
		}
		
	}
}

display('home','CE Logica Nord',$map);



?>
