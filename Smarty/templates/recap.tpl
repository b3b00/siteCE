<table style='border:1px solid black; margin-left:75px'>
	{assign "lines" $cmd->getLines()}
	{foreach $lines as $line}
		<tr style='border-bottom:1px dashed black;'>
		<td style='border-bottom:1px dashed black;'>{$line->getLabel()}</td>
		<td style='border-bottom:1px dashed black;'>{$line->getUnitaryPrice()} &euro; X {$line->getQuantity()} : {$line->getQuantity()*$line->getUnitaryPrice()} &euro;</td>
		</tr>	
	{/foreach}
	<tr>
	<td style='text-align:right;border-top:1px solid black;padding-top:5px;font-weight:bold;'>Total</td>
		<td style='text-align:right;border-top:1px solid black;padding-top:5px;font-weight:bold;'>{$cmd->getPrice()} &euro; </td>
	</tr>
</table>