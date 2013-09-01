<?php


function loadConfigsNumbered($dir) {
	$tmp = loadAllConfig($dir);
	$res = array();
	foreach ($tmp as $k => $cfg) {
		array_push($res,$cfg);
	}
	return $res;
}

function loadAllProperties($dir) {
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

function findProperties($dir,$host) {
	$list = loadAllConfig($dir);
//	echo"<b style='color:green'>";
//	print_r($list);
//	echo "</b><br>";
	return $list[$host];
}


class Properties {

	var $properties;
	var $file;


	function Properties($file) {
		$this->file = $file;
		if (file_exists($file)) {
			$this->properties = loadFile($file);
		}
	}


	function getProperty($name) {
		return $this->properties[$name];
	}
	
	function setProperty($name,$value) {
		$this->properties[$name] = $value;
	}
	
	function dump() {
		//var_dump($this->config);
	}
}

function save() {
	$handler = fopen($this->file, "w+");
	foreach($this->properties as $k=>$v) {
		fwrite($handler, $k."=".$v."\n");
	}
	fclose($handler);	
}

function loadFile($file) {
   $array_tmp = file($file);
   foreach($array_tmp as $v)
   {
       if ((substr(trim($v),0,1)!='#') && (substr_count($v,'=')>=1))
       {
           $pos = strpos($v, '=');
           $properties[trim(substr($v,0,$pos))] = trim(substr($v, $pos+1));
       }
   }
   
   
   
   unset($array_tmp);
   return $properties;
}



?>