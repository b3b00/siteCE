<?php

require_once('common/tools.php');
require_once('common/news.php');
global $config;
$events = News::getAllActive($config);

?>
<table style='width:100%'>
<?
foreach ($events as $e) {
	
	if ($e->hasContent($config)) {	
?>
		<h2><?php linkto($e);?></h2>
		<?php
	}
	else { ?>
		<h2><? echo $e->getDescr(); ?></h2>
	<?php	
	}
	
	echo $e->getAnnounce();
	
}?>
</table>