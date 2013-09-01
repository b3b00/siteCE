	<script>
	function validCommand() {
		return $('#totaltotal').html().length && parseFloat($('#totaltotal').html());
	}

var st='odd';
	
  function ifhid{$id|substr:0:3}() {
      $('#billet{$id} > tbody > tr').filter(":visible").each( function() {
         /*var st = 'even';
         var pst = 'odd';*/ 
         var elem = jQuery(this);
        // if (elem.css('display') !== 'none') {                        
            elem.attr('class',st);                
            st = st == 'odd' ? 'even' : 'odd';
                        
         //}
      });
    
  }
  
  function no{$id|substr:0:3}() {                
     $('#billet{$id}').hide();
     $('#No{$id}').show();
  }	


	$(function() { 
  var theTable = $('#billet{$id}');


  $('#filter{$id}').keyup(function() {
$('#billet{$id}').show();
     $('#No{$id}').hide();
    $.uiTableFilter( theTable, this.value,no{$id|substr:0:3},null,ifhid{$id|substr:0:3} );
  })

  
	});
</script>

<a href="#" onclick="$('#{$id}').toggle(); return false;"><h2 >{$type}</h2></a>
<div id='{$id}' >
<input type='text' id="filter{$id}" class='filter'/>

 <h4 id='No{$id}' style='color:red;display:none'>pas de {$label}</h4>

<table id='billet{$id}'>
<thead>
<tr><th>nom</th><th>infos complémentaire</th><th>prix unitaire</th></tr>
</thead>
</tbody>

{assign n 0} 
{foreach from=$data item=price}

{if (is_object($price) && count($price) > 0)}
{assign n $n+1}
{if ($n % 2 == 0)}
<tr class="odd">
{else}
<tr class="even">
{/if}

<td>{$price->getLabel()}</td>
<td>{$price->getInfo()}</td>
<td><input type='text' id='price{$price->getId()}' value='{$price->getPrice()}'	/>
</td>
<td><a href="#" onClick='resetPrice({$price->getId()},{$price->getPrice()});'><img alt="annuler" src="images/undo.png"></a></td>
<td><a href="#" onClick="updatePrice({$price->getId()},$('#price{$price->getId()}'));"><img alt="sauver" src="images/save.png"></a></td>
<td><a href="admin.php?page=delPrice&id={$price->getId()}"><img src="images/trash.png" ></td>
</tr>
{/if}

{/foreach}
</tbody>
</table>
<h4>Ajouter un prix</h4>
<form action="admin.php" method="GET">
	<input type="hidden" name="cat" value="{$type}"/>
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
	