<?php

require_once('common/tools.php');
require_once('common/news.php');

echo "<h1>SEARCH</h1>";

global $config;

$search = isset($_POST['search']) ? $_POST['search'] : "";
$search = htmlentities($search,ENT_COMPAT,'UTF-8');
$encoding = $config->getProperty("encoding");
$result = Page::search($config,$search);

if (count($result)==0) { ?>
	<h2> pas de résultat </h2>
	<?php
}
else { ?>
	<h2> Résultats </h2>"
	<ul>
	<?php
	foreach($result as $page) {
		if (isset($page)) {  ?>
			<li><?php linkto($page)?><br></li>
		<?php
		}
	}	
}
?>

