

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
		return remove_spaces(remove_accent($str));
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

$config = new Config("config/conf.cfg");
$prices = Price::loadAll($config);

foreach($prices as $type=>$data) {

?>


	<script>
	$(function() { 
  var theTable = $('#billet<?php echo $type; ?>')

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
});
</script>
<h2><?php echo $type; ?></h2>

<?
}
?>

