<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="flavorzoom_files/flavorzoom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.8.1.min.js"></script> 

<script type="text/javascript" src="../js/jquery.uitablefilter.js"></script></head>
<script>
function ttt() {
var total = 0;

	var count = $('input.quantity[value!=""]').map(function() { total = total+1; }).get();
	alert(count);

}
</script>

<style>
input.quantity {

}
</style>

<body>

<?php
	
	require_once("common/config.php");
	require_once("common/price.php");
	
	

	function remove_spaces($type) {
		return str_replace(' ','_',$type);
	}
	
	function getId($str) {
		return remove_spaces(stripAccents($str));
	}
	
	function remove_accent($str){
$ch = strtr($str,
      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
return $ch;
}
	
function filter($type) {
return "<script>$(function() { 
  var theTable = $('#billet$type')

	theTable.find('tbody > tr').find('td:eq(1)').mousedown(function(){
    $(this).prev().find(':checkbox').click()
  });

  $('#filter$type').keyup(function() {
    $.uiTableFilter( theTable, this.value );
  })

  $('#filter-form').submit(function(){
    theTable.find('tbody > tr:visible > td:eq(1)').mousedown();
    return false;
  }).focus(); //Give focus to input field
});</script>"; 

}	
	

 
function importItem($type, $cols,$config) {
	$row1 = $cols[0];	
	
	
	$label =  $cols[0];
	$info = $cols[1];
	$price = $cols[2];	
	
	$p = new Price(-1,$label, $info, $type,  str_replace('€','',$price));
	$p->saveOrUpdate($config);	
	
	
} 
 
function importType($type, $data, $config) {
	$typ = getId($type);
	
	foreach($data as $cols) {
		importItem($type,$cols,$config);
	}	
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
		while (($data = fgetcsv($handle,100000, ";","\"")) !== FALSE) {
			
			$num = countNotNull($data);
			
			if ($num == 1) {
				$type = $data[0];
echo "changing type :: ".$type."<br>";

			}
			if ($num == 0) {
				$struct[$type] = $current;
				$current = array();
				$type="";				
			}
			if ($num == 3) {
				$content = array();
				$tmp = array();
				$tmp[] = $data[0];
				for ($i = 1; $i < count($data); $i++) {
					$tmp[] = $data[$i];
				}
				
				$content[] = $tmp;
				$lastitem=$data[0];				
				$current[] = $tmp;
			}
			if($num == 2 && strlen($data[0]) == 0) {
				$content = array();				
				
				$content[] = $lastitem;
				for ($i = 1; $i < count($data); $i++) {
					$content[] = $data[$i];
				}				
				
				$current[] = $content;
			}
		}
		
		fclose($handle);
	}
	
	foreach($struct as $type=>$data) {
echo "importing category [".$type."] ..... <br><br>";
		importType($type,$data, $config);
	}
	
	return $struct;
	
	
	
	
}

//echo "<input type='button' onclick='ttt();'/>";

$conf = new Config("config/conf.cfg");
Price::clearAll($conf);
$p = loadPrices($_GET['path'],$conf);	

?>

</body>
</html>	
	
	