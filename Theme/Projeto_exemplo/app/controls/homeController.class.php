<?php 


class homeController extends Controller {
	
	var $model;
	
	var $base = array();
	
	function __construct(){
	
		$this->model = new homeModel();
	}
	
	function index_action(){
	
		$this->view("home");
		
	}
	
	
	function page1(){
		
		$this->view("page1");
		
	}
	function page_404(){
		
		echo "Error 404";
		
	}function page_Error(){
		
		echo "Error page_Error";
		
	}
	
	
}

?>