<html manifest="billetmanifest.txt">
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script> 

<script type="text/javascript" src="js/jquery.uitablefilter.js"></script>
<title>outil billeterie</title>
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


function buildRow(id) {
		content = '<tr><td><a href="#" onClick="$(this).parent().parent().remove();	$(\'#qte'+id+'\').val(\'\');updateTotal();setSubmit();"><img src="images/false.gif"/></a></td><td id="label'+id+'">'+id+'</td><td><input align="center" style="text-align:center" size="2" type="text" id="cmd_qty'+id+'" name="cmd_qty'+id+'"/></td><td> X <span id ="price'+id+'"></span>&nbsp;&euro;</td><td> : <span class="total" id="total'+id+'"/>&nbsp;&euro;</td><tr>';
		return content;
	}
	
	function setSubmit() {
		if (isValidForm()) {
			$('#submit_cmd').removeAttr('disabled');
		}
		else {
			$('#submit_cmd').attr('disabled', 'disabled');
		}
	}
	
	function updateTotal() {
		total = getTotal();
		//alert(total);
		$('#totaltotal').html(total);
	}
	
	function isValidForm() {
		valid = $('#email').val() != '';
		valid = valid  && getTotal() != 0.0;
		return valid;
	}
	
	
	
	function getTotal() {
			total = 0;
		$("span.total").each(function(i,elt) {
			total = total  + parseFloat($(elt).html());
			});
		//total = total + elt.html();});
		return total;
		
	}

	function updateRowfromCommand(id) {
		if ($('#qte'+id).length) {
			$('#qte'+id).val(qty);
		}
	}
	
	function addRow(id, label, qty, price) {
		if ($('#cmd_qty'+id).length) {
			$('#cmd_qty'+id).val(qty);
		}
		else {
			if (qty.length && label.length && id.length && price.length && id.length) {
				content = buildRow(id);			
				$('#cmd_items').append(content);
			}
		}		
	
		$('#label'+id).html(label);
		$('#price'+id).html(price);
		$('#cmd_qty'+id).val(qty);
			total = price * qty;
		$('#total'+id).html(total);
		$('#commande').hide();
		$('#commande').show();	
		//alert("qty == [" +qty+"]["+label+"]["+price+"]");
		
		total = getTotal();
		//alert(total);
		$('#totaltotal').html(total);
		
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

table tr.odd td { background : red; border: 1px solid red;}
table tr.even td { background : lightgrey; border: 1px solid lightgrey;}
</style>
</head>

<body>
	
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
	<td class="tab" id="tab_commandeblock"><a href='#' onClick="switchTab('commandeblock');">Ma commande</a></td>
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
	{include file="prices.tpl" id={getid type=$type} type=$type data=$data}
</div>
{/foreach}

<!--/div-->

<div id="commandeblock" class='tab' style="display:none;">
	
	<b>Votre commande :</b><br><br>
	<div id="commande" style="display:inline"><br/>
	<form id="cmd_form" action="index.php?page=doCommand" method='POST'  >
	<table id="cmd_items">
	</table>
	<!--<label for='email'>e-email : </label><input id='email' name='email' type='text' onKeyUp='setSubmit();'>
	<input type='submit' disabled='disabled' id='submit_cmd'  value='valider la commande' name='submit'/ >-->
	</form>
	</div>
	<span style='margin-left:15%; border-top:1px double black;font-weight:bold;font-size:180%'>Total&nbsp;:&nbsp;&nbsp;&nbsp;<span id='totaltotal'></span>&nbsp;&euro;</span>	
	<br/><br/>
	
	
	
</div>
</body>
</html>