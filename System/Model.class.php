<?php 

Class Model {
	
	protected $db;
	
	protected $type_db = "mysqli";
	
	protected $query = "";
	
	public function __construct(){
		
		
	}
	
	function conn(){
		try{
			
			include_once DIR_ROOT."conexao/".$_SERVER['HTTP_HOST'].".php";
			
			$Router = new Router("connect_db");
			
			if($this->type_db == "mysqli"){
				$this->db = $Router->return == null ? new mysqli(HOST,USER,PASS,DB) : $Router->return;
				if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
			}	
			
			
		} catch (Exception $e){

			print "ERRO -> ".$e->getMessage();
		}
		
	}
	
	public function create($Tabela, Array $Dados){
		
		foreach($Dados as $indice => $value){
			$campos[] = $indice;
			$valores[] = $value;
			
		}
		$campos = "`".implode("`, `",$campos)."`";
		$valores = "'".implode("', '",$valores)."'";
		
		return $this->executa($query);
	}
	
	public function executa($query){
		$this->conn();
		
		
		$this->query = mysqli_query($this->db,$query)or die(mysqli_error());
		
		
	}
	
	public function read(){
		$pdo = $this->executa("SELECT * FROM projetos");
		
		return $pdo;
	}
	public function update(){
		
	}
	public function delete(){
		
	}
	
	function retorno($tipo='array'){
	
	
	
		switch ($tipo):
			case "array":
			
				return mysqli_fetch_array($this->query);
				
			break;
		
			case "object":
				return mysqli_fetch_object($this->query);
			break;
			case "assoc":
				return mysqli_fetch_assoc($this->query);
			break;
			
		endswitch;
		
	
	
	}
	
	function fetchAll($tipo=''){
	
		switch ($tipo):
			case "array":
			
				return mysqli_fetch_array($this->query);
				
			break;
		
			case "object":
				return mysqli_fetch_object($this->query);
			break;
			case "assoc":
				return mysqli_fetch_assoc($this->query);
			break;
			
			default:
		
				return mysqli_fetch_all($this->query,MYSQLI_ASSOC);
			break;
			
		endswitch;
	
		
	
	
	}
}

?>