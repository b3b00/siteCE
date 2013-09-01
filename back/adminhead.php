<?php 
	global $config;
?>
<!DOCTYPE html>
<html lang="fr"><head>
		<title>CE NORD - <?php global $title; echo $title; ?></title>
		<!--meta http-equiv=Content-Type content="text/html; charset="<?php echo $config->getProperty('encoding');?>"/--> 
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

a:hover {
	background-color:#ffffff;
	text-decoration:none;
} /* background-color pour IE6*/
a.tooltip  span {
	display:none;
	padding:2px 3px;
	margin-left:10px;
	width:250px;
}
a.tooltip:hover span{
	z-index:0;
	display:inline;
	position:absolute;
	font-weight:bold;
	border:1px solid #cccccc;
	background:#ffffff;
	color:#dd;
}

</style>

</script>
</head>
<body>

			
				<div id="textbanner" style='display:block'>
					CE DO Nord<br>
					<h3><?php global $title; echo $title; ?></h3>
					<a href="admin.php?page=adminpages">pages</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Gestion des pages (ajout suppression, modification</span></a>&nbsp;&nbsp;
				
				<a href="admin.php?page=adminevents">news</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Gestion des news : ajout suppression , changement de statut </span></a>
				&nbsp;&nbsp;
				<a href="admin.php?page=adminmedia">média</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Téléchargement d'images word .... sur le serveur</span></a>
				&nbsp;&nbsp;
				<a href="admin.php?page=user">user</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>gestion des utilisateurs</span></a>
				&nbsp;&nbsp;
				<a href="index.php">front</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Accès au front office</span></a>
				&nbsp;&nbsp;
				<a href="admin.php?page=editPrices">billeterie</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>gestion des prix</span></a>
				&nbsp;&nbsp;
				<a href="admin.php?page=logout">logout<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Déconnexion.</span></a></a>
				
				</div>		