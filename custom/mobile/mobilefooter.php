<?php
require_once('common/tools.php');
require_once('common/news.php');
global $config;
global $map;

$page = "";
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else {
	$page='home';
}
?>

<div data-role='footer' data-theme='d'>

<?php
if ($page == 'home') {
	$events = News::getAllActive($config);	
	$e = $events[0];
	if (isset($e)) { ?>
	
		<h4 align='center' style='text-decoration:none;border-bottom:1px dashed black; '>EN CE MOMENT</h4>
		<h5 align='center'><a  data-transition='flip' href='index.php?page=<?php echo $e->getId().getMobileParam()?>'><?php echo $e->getDescr()?></a></h5>
		<div align='center' style='text-align:center'><?php echo $e->getAnnounce();?></div>
		<?php
	}
}?>
&nbsp;
</div>




<!--
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("<?php global $config; echo $config->getProperty('analytics');?>");
pageTracker._trackPageview();
} catch(err) {}
</script>-->



</body>
</html>