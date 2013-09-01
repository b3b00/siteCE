<?php

require_once('common/config.php');
require_once("Smarty/libs/Smarty.class.php");
DEFINE("ERR_EVENT_EXISTS",11);
DEFINE("ERR_PAGE_EXISTS",1);



/******************************
 *
 * GENERALITES
 *
 ***/

function getSmarty() {
	$smarty = new Smarty();
	
	$smarty->template_dir = 'Smarty/templates/';
	$smarty->compile_dir = 'Smarty/templates_c/';
	$smarty->config_dir = 'Smarty/configs/';
	$smarty->cache_dir = 'Smarty/cache/';
	
	return $smarty;
} 
 
function stripAccents($str){

	//echo "<br>strip(".$str.")";	
	
	$subject = htmlentities($str, ENT_NOQUOTES, "UTF-8");;
	
	//echo "<br>htmlent(".$subject.")";
	
	$subject = preg_replace('/&amp;/','&',$subject,-1);
	
	
	$pattern = '/&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);/';
	preg_match_all($pattern, $subject, $matches, 0, 3);
	
	echo "\n\n";
	//var_dump($matches);
echo "\n";	
	
	$i = 0;
	$out = $subject;
	foreach ($matches[0] as $subst) {
		
		$out = preg_replace("/".$subst."/",$matches[0][$i],$out,-1);
		$i++;
	}

    return $out;

}

function strip2($val) {
	$subst = array("é" => "e",
				   "è" => "e",
				   "ê" => "e",
				   "ë" => "e",
				   "à" => "a",
				   "ä" => "a",
				   "ö" => "o",
				   "ô" => "o",
				   "ù" => "u");
	foreach ($subst as $i => $o) {
		$val = preg_replace("/".$i."/",$o,$val,-1);
	}
	return $val;

}

function generateId($title) {
	$id = strip2($title);
	$id = preg_replace('/ /','_',$id,-1);
	$id = preg_replace('/\'/','_',$id,-1);
	return strtolower($id);
}

 
function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
    }
    return rmdir($dir);
}

function startswith($hay, $needle) {
  return substr(strtolower($hay), 0, strlen($needle)) === strtolower($needle);
}

function endswith($hay, $needle) {
  return substr(strtolower($hay), -strlen($needle)) === strtolower($needle);
}

function connectDB($config) {
	$handle = mysql_connect($config->getProperty("host"),$config->getProperty("user"),$config->getProperty("pwd"));

	@mysql_select_db($config->getProperty("db")) or die( "Unable to select database : ".mysql_error());
	return $handle;
}

/******************************
 *
 * USERS
 *
 ***/
 
 function checkLogin() {
	session_start();
	$logged = false;
	if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
		// on est déjà  loggé tout est ok on continue comme ca
		//echo "already logged<br>";
		$logged =  true;
	}	
	else {		
		if (isset($_POST['user']) && isset($_POST['pwd'])) {
			// on vÃ©rifie si on est pas en train de se logger
			// oui -> on vÃ©rifie le user
			global $config;
			connectDB($config);
			$query = "select iduser from user where iduser='".$_POST['user']."' and pwd=md5('".$_POST['pwd']."')";
			$result = mysql_query($query);			
			if ($result) {
				while($row = mysql_fetch_assoc($result)) {					
					$_SESSION['logged']=1;
					$logged =  true;
				}
			}	
				
		}		
	}
	return $logged;
 }
 
 function logout() {
	unset($_SESSION['logged']);
	session_destroy();
 }
 
 function addUser($user, $pwd) {
	global $config;
	connectDB($config);
	$query = "insert into user values('".$user."',md5('".$pwd."'))";
	// echo $query."<br>";
	$result = mysql_query($query);	
 }
 
 function getUsers() {
 global $config;
	connectDB($config);
	$query="select iduser from user ";
	$result = mysql_query($query);
	$users = array();
	if ($result) {
		while ($row = mysql_fetch_assoc($result)) {
			$users[] = $row['iduser'];
		}
	}
	//print_r($events);
	return $users;
 }

 
 function deleteUser($id) {
	global $config;
	connectDB($config);
	$query="delete from user where  iduser='".$id."'";
	$result = mysql_query($query);	
 }
 
 
 function getMaxRank($config) {
	connectDB($config);
	$query="select max(rank) as mrank from event ";
	$result = mysql_query($query);
	if ($result) {
		while ($row = mysql_fetch_assoc($result)) {
			return $row['mrank'];
		}
	}
	return null;
 }
 



/******************************
 *
 * MEDIA
 *
 ***/
 
DEFINE("IMAGE_EXTENSIONS","gif;png;jpg;jpeg");
 
 function getImageExtension() {
	return preg_split("#;#",IMAGE_EXTENSIONS);	
 }
 
 function listMediaImages($dir) {
	$ext = getImageExtension();
	
	$images = array();
	if (file_exists($dir)) {
		if ($handle = opendir($dir)) {
				
			/* Ceci est la faÃ§on correcte de traverser un dossier. */
			while (false !== ($entry = readdir($handle))) {
				$isImage = false;
				foreach($ext as $e) {
					$isImage = $isImage || endswith($entry,$e);
				}
			
				if ($entry !== "." && $entry !== ".." && $isImage) {
					$images[] = $entry;
					
				}
			}

			closedir($handle);
		}
	}	
	return $images;
	
 }
 
 
 
 
 function listMedia($dir) {
	$ext = getImageExtension();
	
	$images = array();
	if (file_exists($dir)) {
		if ($handle = opendir($dir)) {
				
			/* Ceci est la faÃ§on correcte de traverser un dossier. */
			while (false !== ($entry = readdir($handle))) {
				$notIsImage = true;
				foreach($ext as $e) {
					$notIsImage = $notIsImage && !endswith($entry,$e);
				}
			
				if ($entry !== "." && $entry !== ".." && $notIsImage) {
					$images[] = $entry;
					
				}
			}

			closedir($handle);
		}
	}	
	return $images;
	
 }
 
 
function traceUA($ismobile) {

	$ua = $_SERVER['HTTP_USER_AGENT'];

	$filename = "ua.txt"; 
	$ini_contents ="";
    //first, obtain the data initially present in the text file 
	if(file_exists($filename)) {
		$ini_handle = fopen($filename, "r"); 
		$ini_contents = fread($ini_handle, filesize($filename)); 
		fclose($ini_handle); 
	}
	else {
	}	
    //done obtaining initially present data 
   
    //write new data to the file, along with the old data 
    $handle = fopen($filename, "w+"); 
        $writestring = $ini_contents."\n".$ua." [".($ismobile?"MOBILE":"NOT MOBILE")."]\n----"; 
        if (fwrite($handle, $writestring) === false) { 
            echo "Cannot write to text file. <br />";           
        } 
    fclose($handle); 
	
} 

function isMobile($config) {
	$isMobile = false;
	
	$isMobile = isset($_GET["m"]) || isset($_POST['m']);
	
	$mobileUAs = $config->getProperty('mobUA');
	$exclueUAs = $config->getProperty('excludeMobUA');
		
	if (!$isMobile) {
		$ua = $_SERVER['HTTP_USER_AGENT'];
		foreach($mobileUAs as $name=>$mob ) {
			$test = preg_match("/.*".$mob.".*/",$ua);
			
			$isMobile = $isMobile || $test;
			
		}
		if ($isMobile) {
			foreach($exclueUAs as $name=>$xua) {
				if (preg_match("/.*".$xua.".*/",$ua)) {			
					return false;
				}
			}					
		}
		traceUA($isMobile);
	}
	return $isMobile;
}


 
function getMobileParam() {
	$pmob = '';
	if (isset($_POST['m']) ||isset($_GET['m'])) {
		$pmob='&m';
	}
	return $pmob;
} 
 
function mobilelinkto($item) {
	$pmob = '';
	if (isset($_POST['m']) ||isset($_GET['m'])) {
		$pmob='&m';
	}
	echo "<a data-role='button' data-transition='flip' data-inline='true' href='".urlto($item).getMobileParam()."'>".$item->getDescr()."</a>";
}  
 
function linkto($item) {
	echo "<a href='".urlto($item)."'>".$item->getDescr()."</a>";
} 

function urlto($item) {
	return "index.php?page=".$item->getId();
}


 
?>
