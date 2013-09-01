<?php

require_once('CreateZipFile.php');
require_once('common/tools.php');

class createDirZip extends CreateZipFile {
 
	function get_files_from_folder($directory, $put_into) {
		if ($handle = opendir($directory)) {
			while (false !== ($file = readdir($handle))) {
				if (is_file($directory.$file)) {
					$fileContents = file_get_contents($directory.$file);
					$this->addFile($fileContents, $put_into.$file);
				} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
					$this->addDirectory($put_into.$file.'/');
					$this->get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
				}
			}
			closedir($handle);
		}
		
	}
}

$dir = $_GET["dir"];

$createZip = new createDirZip;
$createZip->addDirectory($dir);
$createZip->get_files_from_folder($dir, $dir);
mkdir("tmp");
$fileName = 'tmp/'.$dir.'.zip';
$fd = fopen ($fileName, 'wb');
$out = fwrite ($fd, $createZip->getZippedfile());
fclose ($fd);
 
$createZip->forceDownload($fileName);
@unlink($fileName);
deleteDirectory("tmp");


?>