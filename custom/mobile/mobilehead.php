<?php
echo "<?xml version=\"1.0\"?>
<!DOCTYPE html> 
<html> 
	<head> ";
	global $title;
	global $page;
?>
	
	<title><?php echo $title?></title> 
	
	<meta name="keywords" content="logica, ce, nord, lille, comité, entreprise"></meta>	
	<meta name="viewport" content="width=device-width, initial-scale=1"></meta> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" ></meta>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" ></link>
	<link rel="stylesheet" href="css/ce-theme.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<!--script src='http://www.google-analytics.com/ga.js' type='text/javascript'></script-->
	
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php global $config; echo $config->getProperty('analytics');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

	</script>
	
	
</head> 

<body> 
<div data-role="header" data-theme="d">
<?php if ($page !== 'home' ) { ?>
<a  data-transition='flip' data-theme="f" data-role='button' data-icon="home" data-iconpos="notext" href="index.php?<?php echo getMobileParam(); ?>" data-inline='true'/>
<a data-rel="back" data-inline='true' data-icon='arrow-l'>back</a>
<?php } ?>
<h1 ><?php echo $title?></h1>	
</div> 
	<div data-role="content">