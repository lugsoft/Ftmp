<?php 

Class Controller {

	protected $contView = "";

	protected $AutoTags = array('header','footer');
	protected $TagExt = ".php";
	
	protected $pathView = null;
	

	public function __construct(){
		$Model = str_replace(__CLASS__,"Model",get_called_class());
		$this->pathView = str_replace(__CLASS__,"",get_called_class());
		
		if(file_exists(def('DIR_ROOT') . def('MODELS') . $Model .".class.php")){
			
			$this->model = new $Model();
		}
	}
	function pathView($path){
		$this->pathView = $path;
	}
	protected function view ($nome){
		
		ob_start(); // start output buffer
		
		
		require_once def('DIR_ROOT')."app/views/".$nome.".phtml";
		
		$this->contView = ob_get_contents(); // get contents of buffer
	
		
		
		ob_end_clean();
		
		
	}
	
	function __destruct(){
		
		$this->pathView = empty($this->pathView) ? 'home' : $this->pathView;
		
		foreach($this->AutoTags as $ind => $val){
		
			if(!is_numeric($ind)){
				
				$this->contView = str_replace("{".$ind."}",$val,$this->contView);
			}
			//
		}
		
		foreach($this->AutoTags as $ind){
			
			if(file_exists(def('DIR_ROOT')."app/views/".$this->pathView."/".$ind.".php")){
					
					$this->contView = str_replace("{".$ind."}",$this->GetTags($ind,"app/views/".$this->pathView),$this->contView);
			}else{
				$this->contView = str_replace("{".$ind."}","",$this->contView);
			}
		}
		
	$host = def("BASE_URL");
	
		
		$this->contView = str_replace("href='/","href='" . $host,$this->contView);
		$this->contView = str_replace('href="/','href="' . $host,$this->contView);
		
		echo $this->contView;
	}
	
	function GetTags($tag,$pasta){
		ob_start(); // start output buffer
		
		require_once def('DIR_ROOT')."/$pasta/".$tag.$this->TagExt;
		
		$return= (ob_get_contents()); // get contents of buffer
		
		ob_end_clean();
		
		return $return;
	}
		
	
}
?>