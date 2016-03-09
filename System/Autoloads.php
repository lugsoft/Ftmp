<?php 

spl_autoload_extensions('.class.php'); 
spl_autoload_register('FTMP_loadClasses'); 

function FTMP_loadClasses($classe) 
{ 


		if(file_exists(def('DIR_ROOT') . def('MODELS') . $classe .".class.php")){
			
			set_include_path(def('DIR_ROOT') . def('MODELS'));
			
		}elseif(file_exists(def('DIR_ROOT') . def('VIEWS') . $classe .".class.php")){
			
			set_include_path(def('DIR_ROOT') . def('VIEWS'));
			
		}elseif(file_exists(def('DIR_ROOT') . def('CONTROLS') . $classe .".class.php")){
			
			set_include_path(def('DIR_ROOT') . def('CONTROLS'));
			
		}
		
		spl_autoload($classe); 
	
	
	
}
function def($param){
	$def = new stdClass();
	$def->DIR_ROOT = str_replace("//","/",str_replace("\\","/",dirname(str_replace("\\System","",__FILE__)))."/".$_SERVER['base_theme']);
	$def->MODELS = "app/models/";
	$def->VIEWS = "app/views/";
	$def->CONTROLS = "app/controls/";
	
	$def->BASE_URL = $_SERVER['REQUEST_SCHEME']."://" . $_SERVER['HTTP_HOST']. $_SERVER['BASE_PROJ'];
	
	return $def->$param;
	
}


?>