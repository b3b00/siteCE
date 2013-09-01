<?php /* Smarty version Smarty-3.1.11, created on 2013-04-17 19:53:37
         compiled from "Smarty/templates/admin/line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1452489927514f35bb88e546-10192838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3064fda36566bbbccb3f3a610a05a810f467f01' => 
    array (
      0 => 'Smarty/templates/admin/line.tpl',
      1 => 1366221212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1452489927514f35bb88e546-10192838',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_514f35bb9328e7_49176280',
  'variables' => 
  array (
    'id' => 0,
    'type' => 0,
    'label' => 0,
    'data' => 0,
    'price' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_514f35bb9328e7_49176280')) {function content_514f35bb9328e7_49176280($_smarty_tpl) {?>	<script>
	function validCommand() {
		return $('#totaltotal').html().length && parseFloat($('#totaltotal').html());
	}

var st='odd';
	
  function ifhid<?php echo substr($_smarty_tpl->tpl_vars['id']->value,0,3);?>
() {
      $('#billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 > tbody > tr').filter(":visible").each( function() {
         /*var st = 'even';
         var pst = 'odd';*/ 
         var elem = jQuery(this);
        // if (elem.css('display') !== 'none') {                        
            elem.attr('class',st);                
            st = st == 'odd' ? 'even' : 'odd';
                        
         //}
      });
    
  }
  
  function no<?php echo substr($_smarty_tpl->tpl_vars['id']->value,0,3);?>
() {                
     $('#billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').hide();
     $('#No<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').show();
  }	


	$(function() { 
  var theTable = $('#billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
');


  $('#filter<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').keyup(function() {
$('#billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').show();
     $('#No<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').hide();
    $.uiTableFilter( theTable, this.value,no<?php echo substr($_smarty_tpl->tpl_vars['id']->value,0,3);?>
,null,ifhid<?php echo substr($_smarty_tpl->tpl_vars['id']->value,0,3);?>
 );
  })

  
	});
</script>

<a href="#" onclick="$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').toggle(); return false;"><h2 ><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</h2></a>
<div id='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' >
<input type='text' id="filter<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class='filter'/>

 <h4 id='No<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
' style='color:red;display:none'>pas de <?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</h4>

<table id='billet<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>
<thead>
<tr><th>nom</th><th>infos complémentaire</th><th>prix unitaire</th></tr>
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
<td><input type='text' id='price<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
' value='<?php echo $_smarty_tpl->tpl_vars['price']->value->getPrice();?>
'	/>
</td>
<td><a href="#" onClick='resetPrice(<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
,<?php echo $_smarty_tpl->tpl_vars['price']->value->getPrice();?>
);'><img alt="annuler" src="images/undo.png"></a></td>
<td><a href="#" onClick="updatePrice(<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
,$('#price<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
'));"><img alt="sauver" src="images/save.png"></a></td>
<td><a href="admin.php?page=delPrice&id=<?php echo $_smarty_tpl->tpl_vars['price']->value->getId();?>
"><img src="images/trash.png" ></td>
</tr>
<?php }?>

<?php } ?>
</tbody>
</table>
<h4>Ajouter un prix</h4>
<form action="admin.php" method="GET">
	<input type="hidden" name="cat" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"/>
        <input type="hidden" name="page" value="addPrice"/>
	<label for="label">Label</label>
	<input type="text" name="label" value=""/><br>
	<label for="info">Info compl&eacute;mentaires</label>
	<input type="text" name="info" value=""/><br>
	<label for="price">prix</label>
	<input type="text" name="price" value=""/><br>
	<input type="submit"name="add" value="add"/><br>
</form>
</div>
	<?php }} ?>