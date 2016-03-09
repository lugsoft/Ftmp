<?php

class Load {

	var $view = "";
	var $Include = "";
	var $Lista = "";
	var $List = array();
	var $Var = array();
	var $ListCont = array();
	public $ftmp = array();
	public $dir_base = "";
	public $router = null;
	
	public $get = "";
	function __construct(){
		$this->setGets();
		
		include_once ROOT_PATH."System/Router.class.php";
		$Router = new Router();
		//include_once ROOT_PATH."Theme/Actions.router.php";
		
		
		$_GET['router'] = $Router->defaut != true ? $Router->router . $this->getRouter() : $this->router;
		
		$this->List = func_get_args();
		
		
		$_SERVER['base_theme'] = "Theme/$Router->router/";
		
		$this->setBase();
		$this->ftmp = ROOT_PATH.$_SERVER['base_theme'];
	}
	function setBase(){
		
		$exp_qs = explode("pg=",$_SERVER['QUERY_STRING']);

		$_SERVER['BASE_PROJ'] = isset($_SERVER['BASE_PROJ']) ? $_SERVER['BASE_PROJ'] :  DIR_FRAMEWORK;
		
	}
	
	function getRouter(){

		 $_SERVER['BASE_PROJ'] = str_replace("//","/",str_replace($this->get."/","",$_SERVER['REQUEST_URI']."/") . $_GET['pg']."/");

		$_GET['pg'] = str_replace($_GET['pg'],"",$this->get);
		$this->setGets();
		return "";
		
	}
	function setGets(){
		$_GET['pg'] = !isset($_GET['pg']) ? 'home/home' : $_GET['pg'];
		$this->get = $_GET['pg'];
		$_GET['router_complete'] = $_GET['pg'];
		$get = explode("/",$_GET['pg']);

		$ultimo_get = "";
		$i = 0;
		
		if($get[0] == ''){
			
			array_shift($get);
		}
	
		foreach($get as $key => $val){
			if($key == 0):$_GET['pg']=$val;endif;
				if($key == 1):$_GET['ref']=$val;endif;
				
				if(!empty($ultimo_get)){
					$_GET[$ultimo_get] = $val;
					$_GET[$val] = false;
				}
			
		}
		
		error_reporting(E_ALL);
		foreach($_GET as $key => $val){
			
			$_GET[$key] = str_replace("'","''",$_GET[$key]);
			
		}
		foreach($_POST as $key => $val){
			
			$_POST[$key] = str_replace("'","''",$_POST[$key]);
			
		}
	}

}