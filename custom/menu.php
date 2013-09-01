<?php
require_once("custom/displaymenu.php");

?>
	</style>
		
		
				
</head>
<body >

			
				<div id="textbanner" style='display:block'>
							
					CE DO Nord <!--a href="atom.php"><img width=25 src="images/atom.svg.png"/></a-->
					
				</div>
				
		<div id="greybar">
			<div class="conteneur">
			<?php displayMenu(isset($_GET['page']) ? $_GET['page'] : 'home') ?>
		<!--/div-->
		</div>
		</div>
		<hr>

		
	
		
