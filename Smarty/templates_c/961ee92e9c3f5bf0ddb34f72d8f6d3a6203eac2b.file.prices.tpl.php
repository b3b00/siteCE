<?php /* Smarty version Smarty-3.1.11, created on 2013-03-25 13:06:26
         compiled from "Smarty/templates/prices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135112855851503dc2e48240-09233362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '961ee92e9c3f5bf0ddb34f72d8f6d3a6203eac2b' => 
    array (
      0 => 'Smarty/templates/prices.tpl',
      1 => 1364050487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135112855851503dc2e48240-09233362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'type' => 0,
    'data' => 0,
    'price' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51503dc2f23244_13154299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51503dc2f23244_13154299')) {function content_51503dc2f23244_13154299($_smarty_tpl) {?>
	<script>
	function validCommand() {
		return $('#totaltotal').html().length && parseFloat($('#totaltotal').html());
	}
	
	
	$(function() { 
  var theTable = $('#billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
')

	theTable.find('tbody > tr').find('td:eq(1)').mousedown(function(){
    $(this).prev().find(':checkbox').click()
  });

  $('#filter<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').keyup(function() {
    $.uiTableFilter( theTable, this.value );
  })

  $('#filter-form').submit(function(){
    theTable.find('tbody > tr:visible > td:eq(1)').mousedown();
    return false;
  }).focus(); //Give focus to input field
	});
</script>

<a href="#" onclick="$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').toggle(); return false;"><h2 ><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</h2></a>
<div id='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' >
<input type='text' id="filter<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>

<table id='billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>
<thead>
<tr><th>nom</th><th>infos complémentaire</th><th>prix unitaire</th><th>quantité</th></tr>
</thead>
</tbody>

<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable(0, null, 0);?> 
<?php  $_smarty_tpl->tpl_vars['price'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['price']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['price']->key => $_smarty_tpl->tpl_vars['price']->value){
$_smarty_tpl->tpl_vars['price']->_loop = true;
?>

<?php if ((is_object($_smarty_tpl->tpl_vars['price']->value)&&count($_smarty_tpl->tpl_vars['price']->value)>0)){?>
<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['n']->value+1, null, 0);?>
<?php if (($_smarty_tpl->tpl_vars['n']->value%2==0)){?>
<tr class="odd">
<?php }else{ ?>
<tr class="even">
<?php }?>

<td><?php echo $_smarty_tpl->tpl_vars['price']->value->getLabel();?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['price']->value->getInfo();?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['price']->value->getPrice();?>
</td>
<td><input type='text' id='qte<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
' 
			onKeyUp='addRow("<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
", "<?php echo $_smarty_tpl->tpl_vars['price']->value->getLabel();?>
", this.value, "<?php echo $_smarty_tpl->tpl_vars['price']->value->getPrice();?>
");'/>
</td>
</tr>
<?php }?>

<?php } ?>
</tbody>
</table>
</div>
<?php }} ?>