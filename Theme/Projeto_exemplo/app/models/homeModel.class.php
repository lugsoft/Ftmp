<?php 

class homeModel {
	
	
	function Projetos(){
		$lista = array(array('nome_projeto'=>'Projeto Criação','projeto'=>'DEV2'),array('nome_projeto'=>'Oto Criação','projeto'=>'DEV'),array('nome_projeto'=>'Oto Criação','projeto'=>'MVC'));
		
		return $lista != null ? $lista : array();
	}
}

?>