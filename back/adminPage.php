<?php

	require_once('common/tools.php');
	require_once('common/config.php');
	require_once('common/page.php');
	global $config;
	global $map;
	

?>

				
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block;float:left;border:dashed grey thin ;'>
				
				<?php
					require_once('common/tools.php');
					global $map;
					global $config;
					
					//var_dump($map);
					
					$maxDepth = Page::getMaxDepth($config);
					
					function displayPage($page, $maxDepth) {
						//var_dump($page);
						if(strlen($page->getDescr()) && $page->getId() !== 'search') {
							echo "<li style='list-style-image: url(images/".($page->isActive()?"true.gif":"false.gif").")'>";
							echo $page->getDescr()."&nbsp;&nbsp;&nbsp;";
							if ($page->getId() != 'home' && $page->getId() != 'search') {
								echo "<a href='admin.php?page=delpage&id=".$page->getId()."'><img width='15px' src='images/delete.gif' title=\"Supprimer <".htmlentities($page->getDescr(),ENT_QUOTES,'UTF-8').">\"/></a>&nbsp;&nbsp;&nbsp;";
								echo "<a href='admin.php?page=editpage&id=".$page->getId()."'><img width='15px' src='images/edit.gif' title=\"Editer <".htmlentities($page->getDescr(),ENT_QUOTES,'UTF-8').">\"/></a>&nbsp;&nbsp;&nbsp;";
								
								if ($page->isNode() ) {	
									echo "<a href='admin.php?page=editpage&parent=".$page->getId()."'><img width='15px' src='images/plus.gif' title=\"Ajouter une page sous <".htmlentities($page->getDescr(),ENT_QUOTES,'UTF-8').">\"/></a>"; 	
									$children = $page->getChildren();
									if (isset($children) && count($children) > 0) {
										echo "<ul>";										
										foreach ($children as $p) {
											displayPage($p,$maxDepth);
										}
										echo "</ul>";
									}
								}
							}
							echo "</li>";
						}
					}
					
					
					
					if (count($map) > 0) { 
				
					echo "<ul>";
					foreach($map as $id => $page) {
						displayPage($page,$maxDepth);	
					 }
					 echo "</ul>";
					
				
				echo "</table>";
					
				}
				else {
				
				echo "<h2>pas de pages</h2>";
				
				}
				
				?>	
				<a href="admin.php?page=newpage">nouvelle page</a>		
		</div>
		<div style='float:left; border:dashed grey thin;background:#ffffff;color:#dd; font-weight:bold;padding-bottom:20px;padding-top:20px;width:30%;'>
		<p style='text-align:center;text-decoration:underline;color:#2299ee'>HELP</p>
			<ul>
				<li style='list-style-type:none;float:left'><img src='images/delete.gif' width='28px'/><span style='margin-left:10px;'>Suppression de la page</span><br></li>
				<li style='list-style-type:none;'>&nbsp;</li>
				<li style='list-style-type:none;float:left'><img src='images/edit.gif'/><span style='margin-left:10px;'>Edition de la page (pour modification du contenu ou du titre par ex)</span><br><br></li>
				<li style='list-style-type:none;'>&nbsp;</li>
				<li style='list-style-type:none;float:left'><img src='images/plus.gif'/><span style='margin-left:10px;'>Ajout d'une page dans le menu</span></li>
				<li style='list-style-type:none;'>&nbsp;</li>
			</ul>
			<br/>
			&nbsp;
			<br/>
			
		
		</div>
		</div>
</body>
</html>