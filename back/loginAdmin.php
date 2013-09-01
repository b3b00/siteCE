<!DOCTYPE html>
<html lang="fr"><head>
		<title>CE NORD</title>
		<meta http-equiv=Content-Type content="text/html; charset="<?php echo $config->getProperty('encoding');?>"/> 
		<link media="all" type="text/css" href="style/admin.css" rel="stylesheet"/>	
		<script src="js/scripts.js" type="text/javascript"></script>
		
		<script src="js/tiny_mce.js" type="text/javascript" ></script>	
		<script src="js/config.js" type="text/javascript"></script>
		
		<script src="js/admin.js" type="text/javascript"></script>
		
		




		
		

<style>
table tr td {
	padding-bottom:15px;
}
div#textbanner a {
	font-size:10pt;
}
</style>

</script>
</head>
<body>

			
				<div id="textbanner" style='display:block'>
					CE DO Nord<br>
					<h3><?php global $title; echo $title; ?></h3>
					
				&nbsp;&nbsp;
				<a href="index.php">front</a>
				&nbsp;&nbsp;
				
				</div>	
				
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block'>
				<form action='admin.php?page=doadmin' method='post'>
				<table>
					<tr><td>username : </td><td><input type='text' name='user' id='user'/></td></tr>
					<tr><td>password : </td><td><input type='password' name='pwd' id='pwd'/></td></tr>
					<tr><td colspan='2' align='center'><input type='submit' name='go' value='OK'/></td></tr>
				</table>
				</form>
				
			</div>	
		</div>
		</div>
</body>
</html>