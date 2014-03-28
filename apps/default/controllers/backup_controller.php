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
	
	
	
	public function onException($e){
		if($e instanceof DispatcherException){
			
			if($e->getCode()==Dispatcher::NOT_FOUND_ACTION){
				Flash::notice("Lo sentimos la página no existe");
				Router::routeTo("controller: home", "action: error");
			}
			if($e->getCode()==Dispatcher::NOT_FOUND_CONTROLLER){
				Flash::notice("Lo sentimos la Controlador no existe");
				Router::routeTo("controller: home", "action: error");
			}
			if($e->getCode()==Dispatcher::NOT_FOUND_FILE_CONTROLLER){
				Flash::notice("Lo sentimos la Archivo no existe");
				Router::routeTo("controller: home", "action: error");
			}
			if($e->getCode()==Dispatcher::NOT_FOUND_INIT_ACTION){
				Flash::notice("Lo sentimos la Init  no existe");
				Router::routeTo("controller: home", "action: error");
			}
			if($e->getCode()==Dispacher::INVALID_METHOD_CALLBACK){
				Flash::notice("Lo sentimos la Metodo  no existe");
				Router::routeTo("controller: home", "action: error");
			}
			if($e->getCode()==Dispatcher::INVALID_ACTION_VALUE_PARAMETER){
				Flash::notice("Lo sentimos la parametros  no existe");
				Router::routeTo("controller: home", "action: error");
			}
			
		} else {
		//Se relanza la excepción
			throw $e;
			Router::routeTo("controller: home", "action: error");
		}
		
	}
	
					
			public function notFoundAction($actionName=''){
				$logger = new Logger("File", "notFoundReports.txt");
				$logger->log("No se encontró la acción $actionName");
			}



}

?>