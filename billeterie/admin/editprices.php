<?php
	
	require_once("common/config.php");
	require_once("common/price.php");
	require_once("Smarty/libs/Smarty.class.php");
	
	$smarty = getSmarty();


	
	
	
	

$config = new Config("config/conf.cfg");
$prices = Price::loadAll($config);
//echo "<b style='color:red'>".print_r($prices,true)."</b><br><br><hr>";
$smarty->assign('billets',$prices);
$smarty->display('admin/edit.tpl');



