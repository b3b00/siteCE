
				
		<div id='content' style='margin-top:150px;display:block'>
			<div class="conteneur" style='display:block'>
			
			<div style='border:1px dashed grey;text-align: center'>
			<p style='text-align:center;font-weight:bold;text-decoration:underline;margin-bottom:20px;color:#2299ee'>Information</p>
				Une news est constitutée de :
				<ul>
				<li>Une annonce : l'annonce est un texte court affichée en page d'accueil et dans le flux RSS. Pour parler anglais il s'agit du teaser de la news.</li>
				<li>Une page : une page de contenu qui vient s'insérer dans un menu quelconque. Sur la page d'accueil le titre de la news est un lien redirigeant vers la page.</li>
				
				</ul>
				
			</div>
			<br><br>
			
			<form  action="admin.php?page=addevent" method="post"
enctype="multipart/form-data" onsubmit="return submitForm();" >
				
				
				

				
			<table>
				<!--<tr><td>ID&nbsp;:</td><td><input type="text" size="40" id="identifier" name="identifier" placeholder='id unique'/></td></tr>-->
				<tr><td>Description&nbsp;<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Titre de la news et de la page associée</span></a>:</td><td><input size="100" type="text" id="descr" name="descr" placeholder="titre de l'Ã©vÃ©nement"/></td></tr>
				<tr><td>Actif ?&nbsp;<a class='tooltip' href='#'><img src='images/help.png' width='28px'/><span><ul><li>cochée : Indique que la news est visible sur page d'accueil</li><li style='list-style-type:none;'>&nbsp;</li><li>décochée : news invisible</li>:</td><td><input  type="checkbox" id="active" name="active" /></td></tr>
				
				
				<!-- ****************** -->
				<tr><td colspan="2">Annonce&nbsp;<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>court texte apparaissant sur la page d'accueil et décrivant rapidement le contenu de la news</span></a>:<br><br>
						<a href='#' onclick='openImagePicker("rteNews")'>[Ajouter une image]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant la sélection d'une image à insérer</span></a>
						&nbsp;&nbsp;<a href='#' onclick='openResourcePicker("rteNews")'>[Ajouter un lien vers un media]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant l'insertion d'un lien vers un fichier word, pdf, ... préalablement déposé sur le serveur </span></a>
												<br><br>					
						<input type="hidden" name="imageNews" id="imageNews" onChange="addImage(this.value,'rteNews')"/>
									

						<textarea id="rteNews" name="rteNews" rows="15" cols="80" style="width: 80%">
						texte de la news en page d accueil 
			</textarea>
			
					</td></tr>
					
					
					<tr><td>Cible&nbsp;<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>menu dans lequel sera insérée la page</span></a>:</td><td><select id='target' name='target'><option value=""></option>
					<?php
					global $map;
					$parent = "events";
					function displayNode($page) {
						global $parent;
						if ($page->isNode()) {
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
					</select></td></tr>
					
					<tr><td colspan="2">
					
					
					Contenu&nbsp;<a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span>Contenu de la page de news</span></a>:<br>
					<input type="hidden" name="imageContent" id="imageContent" onChange="addImage(this.value,'rteContent')"/>
					<br>
					<a href="#" onclick='openImagePicker("rteContent")'>[Ajouter une image]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant la sélection d'une image à insérer</span></a>
					&nbsp;&nbsp;<a href='#' onclick='openResourcePicker("rteContent")'>[Ajouter un lien vers un media]</a><a class='tooltip' href='#'><img src='images/help.png' width='24px'/><span> Ouvre une popup permettant l'insertion d'un lien vers un fichier word, pdf, ... préalablement déposé sur le serveur </span></a><br>					
					<br>
					<textarea name="rteContent" id="rteContent">
					contenu de l'Ã©vÃ©nment (dans la rubrique evenements) 
					</textarea>
					</td>
					
					
					
					</tr>
				<tr><td colpsan="2" align="center"><input type="submit" id="envoyer" name="go" value="OK"/></td></tr>
			</form>			
		</div>
		</div>
</body>
</html>