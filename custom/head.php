<?php 
	global $config;
	
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	 //echo $page;
	//echo "<b>map counts ".count($map)." pages</b><br>";
 
	$item = Page::get($map,$page);
	 //var_dump($item);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>		
		<title>CE NORD - <?php if ($item) { echo $item->getDescr(); } ?></title>
		<!--meta http-equiv=Content-Type content="text/html; charset=<?php echo $config->getProperty('encoding');?>"/--> 
		<link rel="stylesheet" href="style/style.css" type="text/css" media="all">	
		<link type="application/atom+xml" rel="alternate" href="atom.php" title="Flux Atom new CE Logica Nord" />
		<script language="javascript" type="text/javascript" src="jquery-1.8.0-min.js"></script>
		

		<script type="text/javascript" src="js/scripts.js"/>
				<script type="text/javascript" src=" http://www.google-analytics.com/ga.js"></script>
		<style>
		
		