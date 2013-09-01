<?php
require_once("common/config.php");
require_once("common/price.php");

$config = new Config("config/conf.cfg");
$prices = Price::loadAll($config);
//echo "<b style='color:red'>".print_r($prices,true)."</b><br><br><hr>";
//$smarty->assign('billets',$prices);
//$smarty->display('main.tpl');



function getproperty($lbl, $val) {
	return '"'.$lbl.'":"'.$val.'"';
}

function getUnitaryPrice($p) {
	
	$id = $p->id;
	$label = $p->label;
	$info = $p->info;
	$category = $p->category;
	$price = $p->price;
	$json = '{';	
	$json .=  getproperty('id',$id).",";
	$json .=  getproperty('label',$label).",";
	$json .=  getproperty('info',$info).",";
	$json .=  getproperty('price',$price).",";
	$json .=  getproperty('quantity','');
	$json .= "}";
	return $json;
}

function getCategoryJSON($cat) {
	// echo "<hr>";
	// echo "<hr>";
	// var_dump($cat);
	// echo "<hr>";
	// echo "<hr>";
	$json = ' [';
	$i = 0;
	$count = count($cat);
	foreach ($cat as $p) {
		$json .= getUnitaryPrice($p);
		if ($i < $count-1) {
			$json .= ",\n"; 
		}
		$i++;
	}	
	$json .= ' ]';
	return $json;
}

function getPricesJSon($prices) {
	$json = ' {';
	$i = 0;
	$count = count($prices);
	foreach ($prices as $lbl => $cat) {
		$json .= '"'.$lbl.'":';
		$val = getCategoryJSON($cat);
		$json .= $val;
		if ($i < $count-1) {
			$json .= "\n,"; 
		}
		$i++;
	}	
	$json .= ' }';
	return $json;
}
//header( "Content-Type: application/json; charset=UTF-8");
echo trim(getPricesJSON($prices));

?>



