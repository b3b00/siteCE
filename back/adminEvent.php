<?php

	require_once('common/tools.php');
	require_once('common/news.php');
	global $config;
	global $map;
	
	$news = News::getAll($config);

?>


				
		<div id='content' style='margin-top:150px;display:block;'>
			<div class="conteneur" style='display:block;float:left;'>
				
				
				
				
				<?php					
					if (count($news) > 0) { 
				
					echo "<table class='admin'>";
					echo "<tr><th>description</th><th>actif</th><th>rang</th><th></th></tr>";
					foreach($news as $n) {
				
					echo "<tr>";
					echo "<td>".$n->getDescr()."</td>";
					echo "<td><a href='admin.php?page=changeevtstate&id=".$n->getId()."'><img src='images/".($n->isActive() ? "true.gif" : "false.gif") ."'/></a></td>";
					echo "<td>".$n->getRank()."</td>";
					echo "<td><a href='admin.php?page=deleteevt&id=".$n->getId()."'><img alt='suppression' src='images/delete.gif'/></a></td>";
					echo "</tr>";
					
					 }
					
				
				echo "</table>";
					
				}
				else {
				
				echo "<h2>pas de news en cours</h2>";
				
				}
				
				?>	
				<a href="admin.php?page=newevent">Nouvelle news</a>		
		</div>
		<div style='float:left; border:dashed grey thin;background:#ffffff;color:#dd; font-weight:bold;padding-bottom:20px;padding-top:20px;width:30%'>
		<p style='text-align:center;text-decoration:underline;color:#2299ee'>HELP</p>
			<ul>
				<li style='list-style-type:none;float:left'><img src='images/delete.gif' width='28px'/><span style='margin-left:10px;'>Suppression de la news</span><br></li>
				<li style='list-style-type:none;'>&nbsp;</li>
				<li style='list-style-type:none;float:left'><img src='images/true.gif'/><span style='margin-left:10px;'>Activation de la news, elle devient visible sur la page d'accueil et dans le flux RSS </span><br><br></li>
				<li style='list-style-type:none;'>&nbsp;</li>
				<li style='list-style-type:none;float:left'><img src='images/false.gif'/><span style='margin-left:10px;'>Désactivation de la news, elle devient invisible sur la page d'accueil et dans le flux RSS </span></li>
				<li style='list-style-type:none;'>&nbsp;</li>
			</ul>
			<br/>
			&nbsp;
			<br/>
			
		
		</div>
		</div>
</body>
</html>