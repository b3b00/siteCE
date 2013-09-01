<?php

require_once('common/tools.php');
require_once('common/news.php');
global $config;
$events = News::getAllActive($config);

?>
<div class='stream'>
<?
foreach ($events as $e) {
	
	if ($e->hasContent($config)) {	
?>
		<h4><?php linkto($e);?></h4>
		<?php
	}
	else { ?>
		<h6><? echo $e->getDescr(); ?></h6>
	<?php	
	}
	
	echo $e->getAnnounce();
	
}?>
</div>