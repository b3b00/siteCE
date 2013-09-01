<?php
require_once('common/tools.php');
require_once('common/config.php');

$config = new Config("config/conf.cfg");

print_r($config);

echo "<hr/>";

isMobile2($config);


?>