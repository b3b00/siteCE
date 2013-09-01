<?php

	require_once("common/page.php");
	require_once("common/config.php");

	
 
function displayRow($row) {
	$content = "";
	if (is_array($row) && count($row) > 0) { 
		//echo "writing row ";
		//print_r($row);
		//echo "<br>";
	
		foreach ($row as $col) {
		//echo "writing subrow ";
		//print_r($col);
		//echo "<br>";	
			if (is_array($col)) {
				foreach($col as $c) {
					//echo "<br>".$c."<br>";
					//echo "<hr>";
					$content .= "<td>".$c."</td>";
				}
			}
			else {
				$content .= "<td>".$col[0]."</td>";
			}
		}
	}
	else {
		
		$content .= "<td>5 :: ".$row."</td>";
		
	}
	
	
	//$content .= "</tr>\n";
	return $content;
} 
 
function displayItem($item, $cols) {
	
	$content = "<tr><td rowspan='".count($cols)."'>".$item."</td>";
	$row1 = $cols[0];
	
	$row = displayRow($row1);
	echo "<b style='colord:green'>".$row."</b><br>";
	$content .= $row;
	$content .= "</tr>\n";
	for ($i = 1; $i < count($cols) ; $i++) {
		$content .= "<tr>";
		$row = displayRow($cols[$i]);
		
		$content .= $row;
		$content .= "</tr>\n";
	}	
	return $content;
} 
 
function displayType($type, $data, $config) {
	
	$content = "<h2 align='center'>".$type."</h2>\n";

	$content .= "<table border=1>";
	foreach($data as $item=>$cols) {
		$content .= displayItem($item,$cols);
	}	
	$content .= "</table>\n";
	
	echo "<br><b style='color:blue'>saving new price page [".$type."] </b><br>";
	
	$page = new Page("price_".stripAccents($type), $type, "billeterie", 0, 2, 1, 0);
	//Page("price_".stripAccents($type), $type, "billeterie", 0,2, 1, 0);
	$page->setContent(utf8_encode($content));	
	$page->save($config);	
	$page->saveContent();
	echo $content;
} 


 
function countNotNull($data) {
	$count = 0;
	foreach($data as $col) {
		$count = $count + (strlen(trim($col)) > 0 ? 1 : 0);
	}
	return $count;
}	
	
function loadPrices($filename, $config) {
	
	
	$struct = array();
	
	$row = 1;
	if (($handle = fopen($filename, "r")) !== FALSE) {
		$type = "";
		$current = array();
		$lastitem = "";
		while (($data = fgetcsv($handle, 1000, ";","\"")) !== FALSE) {
			
		
			$num = countNotNull($data);
			
			if ($num == 1) {
				$type = $data[0];
			}
			if ($num == 0) {
				$struct[$type] = $current;
				$current = array();
				$type="";				
			}
			if ($num == 3) {
				$content = array();
				$tmp = array();
				for ($i = 1; $i < count($data); $i++) {
					$tmp[] = $data[$i];
				}
				$content[] = $tmp;
				$lastitem=$data[0];
				//echo "<b>storing [".$lastitem."]</b><br>";
				$current[$data[0]] = array($content);
			}
			if($num == 2 && strlen($data[0]) == 0) {
				$content = array();
				//$tmp
				for ($i = 1; $i < count($data); $i++) {
					$content[] = $data[$i];
				}
				//echo "<b>2nd [".$lastitem."]</b><br>";
				$tmp = $current[$lastitem];
				$tmp[] = $content;	
				$current[$lastitem] = $tmp;
			}
			
			
		}
		
		fclose($handle);
	}
	
	foreach($struct as $type=>$data) {
		displayType($type,$data, $config);
		echo "<br><br>";
	}
	
	
}
	
	
?>