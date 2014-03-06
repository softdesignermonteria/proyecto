<?php

class BackupController extends ApplicationController {

	public function initialize() {
		$this->setTemplateAfter("adminiziolite");
	}

	public function indexAction(){
		
		
	}
	
	
	public function exportarAction(){
		//$this->ProcessContainer(); 
		$this->setResponse("ajax");
	
	}
	
	public function listarAction(){
		//$this->ProcessContainer(); 
		
		
		
	
	}
	
	
	public function importarAction(){
		//$this->ProcessContainer(); 
		
	}
	
	public function importar2Action(){
		//$this->ProcessContainer(); 
	
	}
	public function importar3Action(){
		//$this->ProcessContainer(); 
	
	}
	
	public function borrarAction(){
		//$this->ProcessContainer(); 
		

		
		
	
	}
	
	
	

}

?>