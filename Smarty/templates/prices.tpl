
	<script>
	function validCommand() {
		return $('#totaltotal').html().length && parseFloat($('#totaltotal').html());
	}
	
	
	$(function() { 
  var theTable = $('#billet{$id}')

	theTable.find('tbody > tr').find('td:eq(1)').mousedown(function(){
    $(this).prev().find(':checkbox').click()
  });

  $('#filter{$id}').keyup(function() {
    $.uiTableFilter( theTable, this.value );
  })

  $('#filter-form').submit(function(){
    theTable.find('tbody > tr:visible > td:eq(1)').mousedown();
    return false;
  }).focus(); //Give focus to input field
	});
</script>

<a href="#" onclick="$('#{$id}').toggle(); return false;"><h2 >{$type}</h2></a>
<div id='{$id}' >
<input type='text' id="filter{$id}"/>

<table id='billet{$id}'>
<thead>
<tr><th>nom</th><th>infos complémentaire</th><th>prix unitaire</th><th>quantité</th></tr>
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
<td>{$price->getPrice()}</td>
<td><input type='text' id='qte{$price->getId()}' 
			onKeyUp='addRow("{$price->getId()}", "{$price->getLabel()}", this.value, "{$price->getPrice()}");'/>
</td>
</tr>
{/if}

{/foreach}
</tbody>
</table>
</div>
