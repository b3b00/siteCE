<?php /* Smarty version Smarty-3.1.11, created on 2013-04-26 13:52:12
         compiled from "Smarty/templates/admin/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1854489799514f35bb6a05e6-89959053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb9fe0b27b05a819f8104007cbbcd713021440ed' => 
    array (
      0 => 'Smarty/templates/admin/edit.tpl',
      1 => 1366977127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1854489799514f35bb6a05e6-89959053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_514f35bb8288a2_92021430',
  'variables' => 
  array (
    'billets' => 0,
    'type' => 0,
    'n' => 0,
    'nn' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_514f35bb8288a2_92021430')) {function content_514f35bb8288a2_92021430($_smarty_tpl) {?><?php if (!is_callable('smarty_function_getid')) include '/homez.614/celogica/www/Smarty/libs/plugins/function.getid.php';
?><html>
<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script> 

<script type="text/javascript" src="js/jquery.uitablefilter.js"></script>
<title>gestion  des prix de billeterie</title>
</head>
<script>

function switchTab(id) {

	<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['billets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
		if (id=='<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
') {
			$('#<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
').show(800);
			$('#tab_<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
').addClass('selected');
			
		}	
		else {
			$('#<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
').hide(800);			
			$('#tab_<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
').removeClass('selected');
		}		
	<?php } ?>
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
	<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(0, null, 0);?>	
	<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['billets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
		<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
		<?php if (($_smarty_tpl->tpl_vars['n']->value==1)){?>
				<td class='tab selected' id="tab_<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
"><a href='#' onclick="switchTab('<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
');"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</a></td>
		<?php }else{ ?>
				<td class='tab' id="tab_<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
"><a href='#' onclick="switchTab('<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
');"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</a></td>
		<?php }?>	
	<?php } ?>	
	<!--<td class="tab" id="tab_commandeblock"><a href='#' onClick="switchTab('commandeblock');">Ma commande</a></td>-->
</tr>
</table>	
	
<!--div id="catalog" class="tab"-->	
<?php $_smarty_tpl->tpl_vars['nn'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['billets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
<?php $_smarty_tpl->tpl_vars['nn'] = new Smarty_variable($_smarty_tpl->tpl_vars['nn']->value+1, null, 0);?>
<?php if (($_smarty_tpl->tpl_vars['nn']->value==1)){?>
<div id="<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
" class='tab' style='display:block;'>
	<?php }else{ ?>
<div id="<?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
" class='tab' style='display:none;'>
<?php }?>
	<?php ob_start();?><?php echo smarty_function_getid(array('type'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("admin/line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('id'=>$_tmp1,'type'=>$_smarty_tpl->tpl_vars['type']->value,'data'=>$_smarty_tpl->tpl_vars['data']->value,'label'=>$_smarty_tpl->tpl_vars['type']->value), 0);?>

</div>
<?php } ?>

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
	<?php }} ?>