<?php
	
	
	function remove_spaces($type) {
		return str_replace(' ','_',$type);
	}
	
	function getId($str) {
		return remove_spaces(remove_accent($str));
	}
	
	function remove_accent($str){
		$ch = strtr($str,
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝאבגדהוחטיךכלםמןנעףפץצשתûü‎ÿ',
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		return $ch;
	}
	
	
function smarty_function_getid($params, &$smarty)
{	
    $type = $params['type'];
    
    return getId($type);
}
?>