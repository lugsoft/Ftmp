<?php 

class Logs {

	function __construct(){
		
	
	}
	function add($file,$txt){
		$this->create($file);
		$get = file_get_contents($file);
		 file_put_contents($file, date("Y-m-d H:i:s"). " - " . $txt."\n==========\n".$get);
		return false;
		$myfile = fopen($file, "r+") or die("Unable to open file!");
		
		fwrite($myfile, $txt."\n ");
		fclose($myfile);
	}
	
	function create($file){
		if(!file_exists($file)){
			 file_put_contents($file, "");
		}
	}
}
?>