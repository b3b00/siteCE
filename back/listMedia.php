<head>
<script>
function setResourceLink(image){
	//alert(image);
	if (opener && !opener.closed && opener.setImage){
		opener.setResourceLink(targetField, image);
	}
	window.close();
}
</script>
<style>
tr {
cursor:pointer;
}

tr:hover {
background:#FFD220;
cursor:pointer;
}
</style>
<body>
<?php

require_once('common/tools.php');

$images = listMedia("media");

echo "<table>";
foreach($images as $entry) {
	
	echo "<tr><td onclick=\"setResourceLink('".$entry."')\">".$entry."</td></tr>";
}
echo "</table>";

			

?>
</body>