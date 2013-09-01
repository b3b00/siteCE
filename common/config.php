<?php



function loadConfigsNumbered($dir) {
	$tmp = loadAllConfig($dir);
	$res = array();
	foreach ($tmp as $k => $cfg) {
		array_push($res,$cfg);
	}
	return $res;
}

function loadAllConfig($dir) {
 $list = array(); 
        if($handler = opendir($dir)) { 
        	
            while (($file = readdir($handler)) !== FALSE) { 
            	
            	$fileChunks = explode(".", $file);
            	
      			if($fileChunks[1] == 'cfg')      			
      			{ 
      		
                 	$cfg = new Config($file);
                 	if ($cfg != null) {
                 		$list[$cfg->getProperty('host')] = $cfg;
                 	}
                } 
            }    
            closedir($handler); 
        } 
        return $list;  
}

function findConfig($dir,$host) {
	$list = loadAllConfig($dir);
//	echo"<b style='color:green'>";
//	print_r($list);
//	echo "</b><br>";
	return $list[$host];
}


class Config {

	var $config;
	var $file;


	function Config($file) {
		//echo "loading [$file] config file<br>";
		$this->file = $file;
		$this->config = loadFile($file);
		
	}


	function getProperty($name) {
		return $this->config[$name];
	}
	
	function dump() {
		//var_dump($this->config);
	}
}

function insertMultiValueProperty($config,$key,$value) {
	$pos = strpos($key, '.');
	$key1 = trim(substr($key,0,$pos));
	$key2 = trim(substr($key, $pos+1));
	$val = array();
	if (isset($config[$key1])) {
		$val = $config[$key1];
	}
	$val[$key2] = $value;
	$config[$key1] = $val;
	return $config;
}

function insertPropertyFromLine($config, $line) {
	$pos = strpos($line, '=');
	$key = trim(substr($line,0,$pos));
	$value = trim(substr($line, $pos+1));
	
	
	$pointIndex = strpos($key, '.');
	if ($pointIndex > 0) {
		$config = insertMultiValueProperty($config,$key,$value);
	}
	else {
		$config[$key] = $value;
	}
	
	return $config;
}

function loadFile($file) {
   $array_tmp = file($file);
	
   $config = array();
   foreach($array_tmp as $v)
   {
       if ((substr(trim($v),0,1)!='#') && (substr_count($v,'=')>=1))
       {
		   $config = insertPropertyFromLine($config, $v);
			/*
           $pos = strpos($v, '=');
           $config[trim(substr($v,0,$pos))] = trim(substr($v, $pos+1));
		   */
       }
   }
   
   if (isset($config["config"])) {
		$cfg = $config["config"];
		foreach($config as $k => $v) {
			if (preg_match("/^".$cfg."/",$k)) {
				unset($config[$k]);
				$l = strlen($cfg);
				$nk = substr($k,$l+1,strlen($k)-$l);
				//echo "config specif : ".$nk."=".$v."<br>";
				$config[$nk]=$v;
				
			}
		}
   }
//   var_dump($config);
   unset($array_tmp);
   return $config;
}



?>
