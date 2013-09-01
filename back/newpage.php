
				
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block;float:left'>


<?php

	require_once("common/page.php");

	global $map;

	$edit = false;
	$id = null;
	$content = null;
	$parent = null;
	$description = null;
	$mobile = false;
	$node =false;
	$active=false;
	
	// var_dump($_GET);
	
	if (isset($_GET['id'])) {
	
		$id = $_GET['id'];
		$page = Page::get($map,$id);
		// var_dump($page);
		$page->loadContent();
		$content = $page->getContent();
		$parent = $page->getParent();
		$description = $page->getDescr();
		$mobile = $page->isMobile();
		$node = $page->isNode();
		$active = $page->isActive();
		
		$edit = true;
	}
	else if (isset($_GET['parent'])) {
		$parent = $_GET['parent'];
	}
	

?>
			
			<form  action="admin.php?page=addpage" method="post"
enctype="multipart/form-data" >



			<table>
				<tr ><td></td>
					<td><input type="hidden" id="identifier" name="id" value='<?php echo $id; ?>'/></td>
				</tr>
				<tr><td><b>Description / Titre &nbsp;</b></td><td>
					<input type="text" id="descr" name="descr" value="<?php echo ($description); ?>"/>
					<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Entrer ici le titre de la page. Il apparaitra dans le menu et sera utilisé comme titre de la page correspondante.</span></a>
					</td>
				</tr>
				<tr><td><b>Mobile ?&nbsp;</b></td><td>
					<input type="checkbox" id="mobile" name="mobile" <?php if ($mobile) echo "checked='checked'"; ?>/>
					<a class='tooltip' href='#'><img src='images/help.png' width='28px'/><span><ul><li>cochée : Indique que la page est visible sur mobile</li><li style='list-style-type:none;'>&nbsp;</li><li>décochée : invisible sur mobile</li></ul></span></a>
					</td>
				</tr>
				<tr><td><b>Node ?&nbsp;</b></td><td>
					<input type="checkbox" id="node" name="node" <?php if ($node) echo "checked='checked'"; ?>/>
					<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>
<ul><li>cochée : simple menu sans contenu</li><li style='list-style-type:none;'>&nbsp;</li><li>décochée : page de contenu</li></ul></span></a>
					</td>
				</tr>
				<tr><td><b>Active ?&nbsp;</b></td><td>
					<input type="checkbox" id="active" name="active" <?php if ($active) echo "checked='checked'"; ?>/>
					<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Quelque soit le moyen de consultation (PC ou mobile) :
<ul><li>cochée : la page est active donc visible</li><li style='list-style-type:none;'>&nbsp;</li><li>décochée : la page est inactive donc invisible</li></ul></span></a>
					</td>
				</tr>
				<tr><td><b>Parent&nbsp;</b></td>
					<td>
					
					<select id='parent' name='parent'><option value=""></option>
					<?php
					global $map;
					global $parent;
					
					function displayNode($page) {
						global $parent;
						if ($page->isNode() && strlen($page->getdescr()) > 0) {
							$selected = $page->getId() == $parent ? "selected=selected" : "";
							echo "<option value='".$page->getId()."' ".$selected.">";
							tab($page->getdepth());
							echo $page->getDescr()."</option>";
							if ($page->countChildren() > 0) {
								foreach($page->getChildren() as $i => $p) {								
									displayNode($p);
								}
							}
						}												
					}					
					
					function tab($d) {
						for ($i = 0; $i < $d ; $i++) {
							if ($i < $d) {
								echo "+";
							}
							echo "&nbsp;&nbsp;&nbsp;";
							
						}
					}
					
					
					foreach($map as  $p) {
						displayNode($p);
					}
					
					?>
					</select>
					
					<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Le menu dans lequel la page apparait</span></a>
					
					</td>
				</tr>				
				<tr><td><b>Contenu&nbsp:</b><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Le contenu de la page</span></a></td>
							
					<td>
						<a style='font-size:13px' href='#' onclick='openImagePicker("rtecontent")'>[Ajouter une image]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant la sélection d'une image à insérer</span></a>
						&nbsp;&nbsp;
						<a style='font-size:13px' href='#' onclick='openResourcePicker("rtecontent")'>[Ajouter un lien vers un media]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant l'insertion d'un lien vers un fichier word, pdf, ... préalablement déposé sur le serveur </span></a>						
						<br><br>		<br><br>
						<textarea name='content' id='rtecontent'><?php echo $content; ?></textarea>
					</td>
				</tr>				
				<tr>
				<td><b>Mots Cl&eacute;s</b><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>les mots clés associés à la page (pour la recherche)</span></a></td>
				<td>
					<input name="add" value="Ajouter un mot cl&eacute;" type='button'onclick="addRowToKeywordTable();"/>					
					<table id='keywordTbl' style='border-collapse;border:1px solid black'>						
						
						<?php
							if ($edit) { 
								$i = 1;
								foreach ($page->getKeywords() as $key) {	
									if (strlen($key) > 0) {
										echo "<tr><td>".$i."</td>";
										echo "<td><input type='text' name='keyword".$i."' size='45' value=".$key."></td>";
										echo "<td><a href='#' id='".$i."' onclick='removeKeyword(".($i-1).");' style='padding-left:15px;padding-right:5px'><img src='images/false.gif'/></a></td></tr>";
											$i++;
									}
								}
							}
						?>
						
						

					</table>
				</td>
				</tr>
				
				
				<tr>
					<td colpsan="2" align="center">
						<input type="submit" id="envoyer" name="go" value="OK"/>
					</td>
				</tr>
				</table>
			</form>			
		</div>
		<div id='preview' style='float:left; border:dashed grey thin;background:#ffffff;color:#dd; font-weight:bold;padding-bottom:20px;padding-top:20px;width:30%;'>
			<p style="text-valign:middle;text-align:center">			
				<a href="#" onclick='window.open("index.php?page=<?php echo $id; ?>");return false'>Pr&eacute;visualisation PC</a>
				<br><br>
				<a href="#" onclick="window.open('index.php?m&page=<?php echo $id; ?>','poop','width=320,height=480,innerHeight=530,resizable=0,modal=yes,alwaysRaised=yes');return false">Pr&eacute;visualisation Mobile</a>
			</p>
		
		</div>
		</div>
</body>
</html>