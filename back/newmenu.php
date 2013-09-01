
<!--
<html>
<head>
<script type="text/javascript" src="js/scripts.js">
				</script>
<!--<script >
	function nextlevel(id,max) {
		//console.log('toggling '+id);
		var e = document.getElementById(id);
		parentDiv = e.parentNode;
		depth=parentDiv.id;
		// alert("depth = "+depth)
		for (var i = 0; i < parentDiv.childNodes.length; i++) {
			if (parentDiv.childNodes[i].nodeName == 'TABLE' && parentDiv.childNodes[i].id != e.id) {				
				parentDiv.childNodes[i].style.display = 'none';
			}
		}				
		for (i=depth; i <= max; i++) {
			hideLowerMenus(i);
		}
		
		e.style.display='block';
	}
	
	function hideLowerMenus(depth) {
		var parentDiv = document.getElementById(depth);
		// console.log("hiding at depth "+depth);
		for (var i = 0; i < parentDiv.childNodes.length; i++) {
			
			if (parentDiv.childNodes[i].nodeName == 'TABLE' ) {			
				// console.log("hiding "+parentDiv.childNodes[i].id);
				parentDiv.childNodes[i].style.display = 'none';
			}
		}			
	}
</script> 

<style>

	div.menu {
		margin-left:10%; margin-right:10%;
	}

	div table.menu {
		border-collapse:collapse;
		border: none;	
		margin-left:auto;
margin-right:auto;

/*width:100%;*/
	}
	table.menu tr td { padding : 0 10pt;background:#ECECEC; }
	table.menu tr td a:hover { background-color: #FFD220; color: #18507C; text-decoration: underline; }

table.menu tr td a.none { background-image:none; }
table.menu tr td a {  
font: bold 1.1em/2.5em "Lucida Grande","Lucida Sans Unicode",tahoma,geneva,sans-serif;
 color: #18507C;
    font: bold 1.1em/2.5em "Lucida Sans","Lucida Grande",tahoma,geneva,sans-serif;
    text-align: center;
    text-decoration: none; }
	
</style> 

<link rel="stylesheet" href="style/style.css" type="text/css" media="all"> 
</head> 
<body> -->
<?php
require_once("tools.php");


function displayMenu() {


	$max = getMaxDepth("root","root","cenord");

	$menu = loadMenu("root","root","cenord");


	// die;

	$main = array('content' => $menu, 'id'=>'main', 'depth' => -1); 
	// var_dump($main);

	for ($i = 0; $i <= $max ; $i++) {
		echo "<div class='menu' style='display:block' id='".$i."'>";
		displayMenuAtDepth($main,$i,$max);
		echo "</div>";
	}

}

function displayMenuAtDepth($map , $depth, $max) {
	$currendepth = $map['depth'];
	if ($currendepth == ($depth-1) && is_array($map['content'])) {
		$display = ($depth==0) ? "block":"none";
		
		echo "<table align='center' id='menu".$map['id']."' style='display:".$display."' class='menu'><tr>";
		foreach($map['content'] as $it) {
			if(is_array($it['content'])) {
				echo "<td><a href='#' onclick=\"nextlevel('menu".$it['id']."',".$max.")\">".$it['descr']."</a></td>";	
			}
			else {
				echo "<td><a href='admin.php?page=".$it["id"]."' >".$it['descr']."</a></td>";	
			}
			
			// echo "<td>".$it['descr']."</td>";
		}
		echo '</tr></table>';	
	}
	else if ($currendepth < ($depth-1)) {
		if (is_array($map['content'])) {
			foreach($map['content'] as $it) {
				displayMenuAtDepth($it , $depth,$max);
			}
		}
	}
}


//				echo "<a href='#' onclick=\"nextlevel('menu".$s['id']."')\">";
		

displayMenu();



?>
