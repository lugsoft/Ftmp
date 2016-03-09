<?php 

$Router->router_defaut("Projeto_exemplo");


$Router->connect_db(function(){
	
		$Router = new Router("Theme");
		
		$MVC = $Router->Theme("MVC2",function(){
			if($_SERVER['HTTP_HOST'] == "localhost"){
				
				return new mysqli(HOST,USER,PASS,DB);
				
			}
		});
		
		if($MVC != null){
			return $MVC;
		}
		
		if($_SERVER['HTTP_HOST'] == "localhost"){
			
			$return = new mysqli(HOST,USER,PASS,DB);
			
		}
		
		return $return;
			
});

?>