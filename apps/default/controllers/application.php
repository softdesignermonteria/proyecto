<?php
class ControllerBase {
  	
	public function onStartApplication(){
		
	}
  
	public function init(){
		Router::routeTo("controller: login","action: login");
		
	}
	
	public function beforeFilter(){
	 	try{
			if(Router::getController()!='login'){
						 if(Session::get("usuario_autenticado") == false || Session::get("usuario_autenticado") == '' ){
							$authLog = new Logger("File", "auth_failed.txt");
							$authLog->log("El usuario debe estar autenticado para usar este modulo recurso: '". $this->getControllerName()."/".$this->getActionName()."'");
							 Flash::error("El usuario debe estar autenticado para usar este modulo");
							 echo "<h4><a href=".core::getInstancePath()."login/login>Haga Click aqui para inicial session</a></h4>";
							 Router::routeTo("controller: login", "action: login");
							 return false;
						 }//fin autenticado
							
			} // fin si esta logueado y es diferente a administrador
				 
				 /*CODIGO DE PERIMISOS DE USUARIO*/
				  $role = Session::get('role');
				 
				  if($role==""){  $role = 'administrador';   }
					  $acl = new Acl('Model', 'className: AccessList');
					  $resourceName = $this->getControllerName();
					  $operationName = $this->getActionName();
				 
				  if($acl->isAllowed($role, $resourceName, $operationName)==false ){
	
					   $authLog = new Logger("File", "auth_failed.txt");
					   $authLog->log("Autenticación fallo para el rol '$role' en el recurso '". $this->getControllerName()."/".$this->getActionName()."'");
					   Flash::addMessage("No tiene permiso para usar esta aplicacion '". $this->getControllerName()."/".$this->getActionName()."' ",Flash::ERROR);
					   Router::routeTo("controller: home", "action: error");
					   return false;
				  }
			}
			catch(DbException $e){
				Flash::notice("Error.. comuniquese con el administrador");
				Router::routeTo("controller: home", "action: error");
			}
			catch(DbSQLGrammarException $e){
				Flash::notice("Error.. comuniquese con el administrador");
				Router::routeTo("controller: home", "action: error");
			}
			     /*}*/
			/*FIN*/ /*CODIGO DE PERIMISOS DE USUARIO*/
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
