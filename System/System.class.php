<?php 

include_once "Logs.class.php";
Class System{
	private $_url;
	private $_explode;
	public $_controller;
	public $_action;
	public $_params;
	
	public $Logs = array();
	
	var $Classes = array();
	public function __construct($file){
		$this->Logs = (Object) new Logs();
		
		$class = __CLASS__;
		require_once("Autoloads.php");
		
		
		//DEFINE("MODELS","app/models/");
		//DEFINE("VIEWS","app/views/");
		//DEFINE("CONTROLS","app/controls/");
		//DEFINE('DIR_ROOT',str_replace("//","/",str_replace("\\","/",dirname($file))."/"));

		
		
	
		
		$this->setController();
		$this->setAction();
		$this->setGets();
		$this->run();
	}
	function setGets(){
		
	}
	
	
	private   function setController(){
	
		$this->_controller = empty($_GET['pg']) ? 'homeController' : $_GET['pg'] ."Controller";
		
	}
	private function setAction(){
		
		$action = (empty($_GET['ref']) || !isset($_GET['ref'])) ? 'index_action' : $_GET['ref'];
		
		$action = (isset($_GET['ref']) and ($action == $_GET['ref'] and $action == $_GET['pg'])) ? 'index_action' : $action;

		$this->_action = $action;
	}
	
	private function run(){
	
		if(file_exists(def("DIR_ROOT") . def("CONTROLS") . $this->_controller .".class.php")){
			$app = new $this->_controller();
		
			if(!method_exists($app,$this->_action)):
				$app = new HomeController();
				$this->Logs->add("error.log","O action $this->_action nao existe no Controllador $this->_controller");
			
					$app->page_error();
				else:
				
				$app->{$this->_action}();
			endif;
			
		}else{
			$this->Logs->add("error.log",json_encode($_GET)."\nErro ao tentar incluir o arquivo " .def("DIR_ROOT") . def("CONTROLS") . $this->_controller .".class.php");
			
			$app = new HomeController();
			$app->page_404();
		}
				
		
	}
	
}

?>