<head>
<style>
img {
margin:10px;
cursor:pointer;
padding:10px;
}

img:hover {
background:#FFD220;
cursor:pointer;
margin:10px;
padding:10px;
}
</style>

<script>
function setImage(image){
	//alert(image);
	if (opener && !opener.closed && opener.setImage){
		opener.setImage(targetField, image);
	}
	window.close();
}
</script>
</head>
<body>

<?php

require_once('common/tools.php');

$images = listMediaImages("media");

foreach($images as $entry) {

	// Content type
	//header('Content-Type: image/jpeg');

	// Get new sizes
	list($width, $height) = getimagesize("media/".$entry);
	$newwidth=120;
	$percent =  $newwidth / $width;
	$newheight = $height * $percent;
	//echo "<br><b>".$img." :: ".$width."x".$height." -&gt;".$newwidth."x".$newheight."</b><br>";

	if (!file_exists("../thumb/".$entry)) {
		//echo "<b>".$entry."</b><br>";
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = null;
		if (preg_match("/.jpg$|.jpeg$/i", $entry)) {
			$source = imagecreatefromjpeg("media/".$entry);
		}
		if (preg_match("/.png$/i", $entry)) {
			$source = imagecreatefrompng("media/".$entry);
		}
		

		// Resize
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		 imagejpeg ($thumb, "thumbs/".$entry, 80);
	}

	echo "<img style='margin:10px;border: black thin solid;float : left' src='thumbs/".$entry."' onclick=\"setImage('".$entry."');\"></img><br><br>";
}


			

?>
</body>