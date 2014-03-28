<?php

	class Roles_de_usuarioController extends ApplicationController {



		/**

		 * Inicializa el Controlador Login

		 *

		 */



		public function initialize() {

			$this->setTemplateAfter("adminiziolite");

		}



		/**

		 * Index por defecto del Controlador

		 *

		 */

		 

		public function indexAction(){

		

		}

		

		/**

		 * Aqui sale el formulario de Iniciar Sesión

		 *

		 */

		 

		 public function not_found($controller, $action){

				 $this->set_response('view');

				 Flash::error("No esta definida la accion $action, redireccionando");

				 return $this->redirect('administrador');

				 

		 }



		/**

		 * Esta accion es ejecutada por application/before_filter en caso

		 * de que el usuario trate de entrar a una accion a la cual

		 * no tiene permiso

		 *

		 */

		public function no_accesoAction(){

				$this->set_response('view');

				 Flash::error("No esta definida la accion $action, redireccionando");

				 return $this->redirect('administrador');

		}

			

		
		/****
			agregarAction vista en la cual se mostrara el 
			formulario para agregar clientes
		***/
		public function agregarAction(){
					
        }
		
		
		
		
		public function addAction(){
			
			$this->setResponse('view');
			$sw=0;
			$role  = new Role();
			//if($role->count("id = '".$_REQUEST['codigo_role']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_role'];
			if($id==''){$id=0;}	

			$role->setId($id); 
			$role->setRole($_REQUEST['nombre_role']); 
			
			if($sw==0){					
				if($role->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($role->getMessages() as $message){
							  Flash::error($message->getMessage());
					}	  
					
				}
			}
					
	    }
		
		
		/*
		* Vista trae formulario de modificacion
		*/
		public function modificarAction($id){
			//$this->setResponse("ajax");
			if( isset($id) ){	
				$codigo_role = $id;
		
				$ies  = $this->Role->findFirst(" id = '$codigo_role' ");
				
				Tag::displayTo("codigo_role",$ies->getId());
				Tag::displayTo("nombre_role",$ies->getRole());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las ies
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$role  = new Role();
			//if($ies->count("id = '".$_REQUEST['codigo_role']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$rolet = $this->Role->findFirst(" id = '".$_REQUEST['codigo_role']."' ")->getRole();	
			$role->setId($_REQUEST['codigo_role']); 
			$role->setRole($_REQUEST['nombre_role']); 
			
			if($sw==0){					
				if($role->save()){
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					
					
					
					if( $this->AccessList->count(" role = '$rolet' ") > 0 ){
						if($this->AccessList->update(" role = '".$_REQUEST['nombre_role']."' ","conditions: role = '$rolet' ")){
							Flash::success("Se actualizaron los permisos Satisfactoriamente");
						}
					}
						
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($role->getMessages() as $message){
							  Flash::error($message->getMessage());
					}	  
					
				}
			}
			echo "<script>quitar_mensajes();</script>";		
	    }
		
		
		/*
		* Vista trae formulario de modificacion
		*/
		public function eliminarAction($id){
			//$this->setResponse("ajax");
			if( isset($id) ){	
				$codigo_role = $id;
		
				$role  = $this->Role->findFirst(" id = '$codigo_role' ");
				
				Tag::displayTo("codigo_role",$role->getId());
				Tag::displayTo("nombre_role",$role->getRole());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$role  = new Role();
			
				
				if($role->delete(" id = '".$_REQUEST["codigo_role"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					
					
					if( $this->AccessList->count(" role = '$rolet' ") > 0 ){
						if($this->AccessList->delete(" role = '".$_REQUEST['nombre_role']."' ")){
							Flash::success("Se borraron los permisos Satisfactoriamente");
						}
					}
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($role->getMessages() as $message){
							  Flash::error("Error Eliminando Ies ".$message->getMessage());
					}	  
					
				}
			echo "<script>quitar_mensajes();</script>";	
			}catch(DbContraintViolationException $e){
						Flash::error($e->getMessage());
						//Flash::error("NO SE PUEDE BORRAR PRODUCTO");
					}catch(DbException $e){
						//Flash::error($e->getMessage());
						Flash::error("NO SE PUEDE BORRAR ESTE REGISTRO: viola restriccion de llave foranea");	
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
						//print_r($e);
					//cierre cacth try
					}	
	    }
		
		
		public function find_buscarAction(){
			$this->setResponse("ajax");
		}
		
		public function find_detalle_buscarAction(){
			$this->setResponse("ajax");
		}
		
		
		public function buscarAction(){
			//$this->setResponse("ajax");
		}
		
		public function detalle_buscarAction(){
			//$this->setResponse("ajax");
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



	}



?>