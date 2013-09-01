<?php
require_once("common/tools.php");


function displayMenu($page) {
	global $config;
	global $map;
		
	$max = Page::getMaxDepth($config);

	//$menu = loadMenu("root","root","cenord");

	$breadcrumb = array();
	if (isset($page) && strlen($page) > 0)  {
		$p = Page::get($map,$page);
		while ($p && $p->getId() != null && strlen($p->getId()) > 0) {
			$breadcrumb[] = $p->getId();			
			$p = Page::get($map,$p->getParent());
		}
	}
	
	
	$main = new Page('main','',null,0,-1,1,1,1); 
	$main->setChildren($map);

	// var_dump($breadcrumb);
	for ($i = 0; $i <= $max ; $i++) {
		
		echo "<div class='menu' style='display:block' id='".$i."'>";
		displayMenuAtDepth($main,$i,$max, $breadcrumb);
		echo "</div>";		
	}
	/*
	echo "<div class='menu' style='display:block'><form method='post' action='index.php?page=search'>";
		echo"<input type='text' name='search' id='search'/>";
		echo"<input type='submit' name='Chercher' value='chercher'/>";
		echo"</form></div>";
		*/
	
}

function displayMenuAtDepth($map , $depth, $max, $breadcrumb) {
	$currendepth = $map->getDepth();
	if ($currendepth == ($depth-1) && $map->isNode()) {
		$display = ($depth==0 || in_array($map->getId(),$breadcrumb)) ? "block":"none" ;
		
		echo "<table align='center' id='menu".$map->getId()."' style='display:".$display."' class='menu'><tr>";
		if ($map->countChildren() > 0) {
			foreach($map->getChildren() as $it) {
				$class = "";
				if (in_array($it->getId(),$breadcrumb)) {
					$class = "class='opened' ";
				}
				if ($it->getId() !== "search" && $it->isActive()) {
					if($it->isNode()) {
						echo "<td ".$class."><a href='#'  onclick=\"nextlevel('menu".$it->getId()."',".$max.");return false;\">".$it->getDescr()."</a></td>";	
					}
					else {
						echo "<td ".$class."><a href='index.php?page=".$it->getId()."' >".$it->getDescr()."</a></td>";	
					}
				}
			}
		}
		
		echo '</tr></table>';	
	}
	else if ($currendepth < ($depth-1)) {
		if ($map->isNode() && $map->countchildren() > 0) {
			foreach($map->getChildren() as $it) {
				displayMenuAtDepth($it , $depth,$max,$breadcrumb);
			}
		}
	}
}



?>
