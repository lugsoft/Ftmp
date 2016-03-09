<?php 

Error_reporting(E_ALL);
class Router {
	public $router = null;
	public $defaut = true;
	
	public $called = null;
	
	public $return = null;
	
	
	public $Theme = null;
	function __construct($call = null){
		$this->called = $call;
		$Router =  $this;
		include ROOT_PATH."Theme/Actions.router.php";
	}
	function set($param1,$param2){
		
		if($this->called != null and $this->called != "Theme"){
			return false;
		}
		
		$return = "";
		$param1 = explode("=",$param1);
		
		if(isset($param1[1]) and empty($param1[1])){
			$param1[1] = "home";
			
		}
		
		if(isset($_GET[$param1[0]]) and $_GET[$param1[0]] == $param1[1]){
			
			$return = $param2;
			$this->Theme = $param2;
			$this->router = $param2;
			$this->defaut = false;
		}
		
		
		return $return;
	}
	
	function router_defaut($param){
		$this->router = $param;
		$this->Theme = $param;
	}
	
	function teste($var,$func){
		
		if($var == "exec"){
			echo $func();
		}
		
	}
	
	function connect_db($Router = null){
		
		if($this->check(__FUNCTION__)){ 
			
			$this->return = $Router();
			
		}
		
	}
	function check($function){

		if($function != $this->called){
			return false;
		}
		return true;
	}
	
	function Theme($Theme,$Router){
		if($this->check(__FUNCTION__)){
			
			if($this->Theme == $Theme){
				$this->return = $Router();
			}
			
		}
	}
}

?>