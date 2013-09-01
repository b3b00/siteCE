<html>
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script> 

<script type="text/javascript" src="js/jquery.uitablefilter.js"></script>
<title>gestion  des prix de billeterie</title>
</head>
<script>

function switchTab(id) {

	{foreach from=$billets key=type item=data}
		if (id=='{getid type=$type}') {
			$('#{getid type=$type}').show(800);
			$('#tab_{getid type=$type}').addClass('selected');
			
		}	
		else {
			$('#{getid type=$type}').hide(800);			
			$('#tab_{getid type=$type}').removeClass('selected');
		}		
	{/foreach}
		if (id=='commandeblock') {
			$('#commandeblock').show(1000);		
			$('#tab_commandeblock').addClass('selected');			
		}	
		else {
			$('#commandeblock').hide(1000);			
			$('#tab_commandeblock').removeClass('selected');			
		}		


}

	


function updatePrice(id,val) {
   v = $('#price'+id).val();
   console.log('val :: '+v);
   u =  'admin.php?page=updatePrice&id='+id+'&price='+v;
   console.log('calling '+u);
   //alert("updating price ["+id+"] to :: "+v);
   $.get(u,function(data) {
             window.location.href='admin.php?page=editPrices'; 
         });
}

function resetPrice(id, price) {
   //alert("reseting price ["+id+"] to :: "+price);
   $('#price'+id).val(price);
}



</script>

<style>
/*
div#commandeblock {
border-left: 1px solid black;
    border-top: 1px solid black;
    font-size: 60%;
    padding: 15px;
    position: fixed;
    right: 5%;
    top: 20%;
    width: 25%;
}
*/

input.filter {
   background: url(images/filter.png);
   background-position: right;
   background-size: 60px 60px;
   background-repeat: no-repeat; 
}

div.tab {
	padding-left : 8px;
	padding-right : 8px;
	padding-top : 8px;
	margin-left : 3px;
	margin-right : 3px;
	padding-bottom : 8px;
	border-top: 1px dotted black;
	border-bottom: 1px dotted black;
	border-left: 1px dotted black;
	border-right: 1px dotted black;
	border-radius : 5px;
}

td.tab {
	padding-left : 8px;
	padding-right : 8px;
	padding-top : 8px;
	margin-left : 3px;
	margin-right : 3px;
	border-top: 1px dotted black;
	border-left: 1px dotted black;
	border-right: 1px dotted black;
	border-radius : 5px;

}

td.selected {
	background:#cccccc;
}

input.quantity {

}

table tr.odd td { background : #ffaaaa; border: 1px solid #ffaaaa;}
table tr.even td { background : #ff5555; border: 1px solid #ff5555;}
</style>
</head>

<body>
	
<h4><a href="admin.php?page=doadmin">&lt;&lt;back</a></h4>
<table id='tabs' >
<tr>
	{assign n 0}	
	{foreach from=$billets key=type item=data}
		{assign n $n+1}
		{if ($n  == 1)}
				<td class='tab selected' id="tab_{getid type=$type}"><a href='#' onclick="switchTab('{getid type=$type}');">{$type}</a></td>
		{else}
				<td class='tab' id="tab_{getid type=$type}"><a href='#' onclick="switchTab('{getid type=$type}');">{$type}</a></td>
		{/if}	
	{/foreach}	
	<!--<td class="tab" id="tab_commandeblock"><a href='#' onClick="switchTab('commandeblock');">Ma commande</a></td>-->
</tr>
</table>	
	
<!--div id="catalog" class="tab"-->	
{assign nn 0}
{foreach from=$billets key=type item=data}
{assign nn $nn+1}
{if ($nn  == 1)}
<div id="{getid type=$type}" class='tab' style='display:block;'>
	{else}
<div id="{getid type=$type}" class='tab' style='display:none;'>
{/if}
	{include file="admin/line.tpl" id={getid type=$type} type=$type data=$data label=$type}
</div>
{/foreach}

<!--/div-->

<div id="commandeblock" class='tab' style="display:none;">
	
	<b>Votre commande :</b><br><br>
	<div id="commande" style="display:inline"><br/>
	<form id="cmd_form" action="index.php?page=doCommand" method='POST'  >
	<table id="cmd_items">
	</table>
	<label for='email'>e-email : </label><input id='email' name='email' type='text' onKeyUp='setSubmit();'>
	<input type='submit' disabled='disabled' id='submit_cmd'  value='valider la commande' name='submit'/ >
	</form>
	</div>
	<span style='margin-left:15%; border-top:1px double black;font-weight:bold;font-size:180%'>Total&nbsp;:&nbsp;&nbsp;&nbsp;<span id='totaltotal'></span>&nbsp;&euro;</span>	
	<br/><br/>
	
	
	
</div>
</body>
</html>
	