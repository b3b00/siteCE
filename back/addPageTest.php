<?php


require_once("tools.php");

global $map;
global $config;

$map = array();
if  (isset($_SESSION["MAP"])) {
	$map = $_SESSION["MAP"];
}
else {
	$map = loadMenu("root","root","cenord");
	$_SESSION["MAP"] = $map;
}

if (isset($_FILES["datafile"])) {
	
	
	$filename = $_FILES["datafile"]["name"];
	$tmpfile = $_FILES["datafile"]["tmp_name"];
	
	echo "filename = ".$filename."<br>";
	
	// echo "<br>id=".$id."<br> parent=".$parent."<br> fn=".$filename."<br> tmp=".$tmpfile."<br>";
	
	if (endsWith($filename,".zip")) {
		$dir = str_replace(".zip","",$filename);
		$tmpdir = "unziptmp/".$dir;
		echo "nszippin to ".$tmpdir."<br>";
		mkdir($tmpdir);
		$ok = copy($tmpfile, "unziptmp/".$filename);
		// echo "<br>copy succeeded ? ".$ok."<br>";
		if (!$ok) {
			error("erreur lors de la recopie du fichier zip");
			die;
		}
		
		/* unzipping */
		 $zip = new ZipArchive;
		 $res = $zip->open("unziptmp/".$filename);
		 if ($res === TRUE) {
			 $zip->extractTo($tmpdir);
					
			 $zip->close();
			 deployPagesAndMedia($tmpdir);
			 insertOrUpdatePages($tmpdir);
			 
			 unlink("unziptmp/".$filename);
			 deleteDirectory($tmpdir);
			 
		 } else {
			error ("error while unzipping ... check your zip file ".$res);
		 }
		
		
	}
	else {
		error("le fichier n'est pas un fichier zip");
	}
}
else {
	error("erreur dans le formulaire");
}



function error($msg) {
	echo "<b style='color:red'>".$msg."</b><br>";
	echo "<br><a href='admin.php?page=adminpagestest'>retour</a><br>";
}

function deployPagesAndMedia($directory) {
	deployDir($directory."/media/","./media/");
	deployDir($directory."/pages/","./pages/");
}

function insertOrUpdatePages($directory) {
global $map;
global $config;
	if (file_exists($directory."/import.csv")) {
		$array_tmp = file($directory."/import.csv");
		$i = 1;
		connectDB($config);
		
	   foreach($array_tmp as $v)
	   {
			$columns = preg_split ( "#;#" , $v);
			if (count($columns) == 6) {
				$id = $columns[0];
				$descr = $columns[1];
				$file = $columns[2];
				$parent = $columns[3];			
				$depth = $columns[4];
				$rank = $columns[5];
			
				
				insertOrUpdate($id,$descr,$parent,$file ,$depth,$rank);
		
				
			
			}
			else {
				echo "erreur Ã  la ligne ".$i." du fichier import.csv : nombre de colonne incorrect : ".count($columns)." au lieu de 6<br>";
			}
			$i++;
	   }
	   $map = loadMenu($config);
	}

}


function deployDir($directory, $toDir) {
	if (file_exists($directory)) {
		if ($handle = opendir($directory)) {
				
			/* Ceci est la faÃ§on correcte de traverser un dossier. */
			while (false !== ($entry = readdir($handle))) {
				if ($entry !== "." && $entry !== "..") {
					// echo "entry == [".$entry."] copying ".$directory."/".$entry." to ./".$toDir."/".$entry."<br>";
					copy($directory."/".$entry, "./".$toDir."/".$entry);
				}
			}

			closedir($handle);
		}
	}	
}



?>