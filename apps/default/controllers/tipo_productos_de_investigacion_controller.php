<?php

	class Tipo_productos_de_investigacionController extends ApplicationController {



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
			$tipo_productoinv  = new TipoProductoInvestigacion();
			//if($tipo_productoinv->count("id = '".$_REQUEST['codigo_tipo_productos_de_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id=0; 
			if($_REQUEST['codigo_tipo_productos_de_investigacion']!=''){ $id=$_REQUEST['codigo_tipo_productos_de_investigacion']; }	
				$tipo_productoinv->setId($id); 
				$tipo_productoinv->setDescripcionTipoInvestigacion($_REQUEST['nombre_tipo_productos_de_investigacion']); 
			if($sw==0){					
				if($tipo_productoinv->save()){
					Flash::success(Router::getController()."   Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
				}else{
					Flash::error("Error: No se pudo Guardar el registro...");	
					foreach($tipo_productoinv->getMessages() as $message){
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
				$codigo_tipo_productos_de_investigacion = $id;
		
				$tipo_productoinv  = $this->TipoProductoInvestigacion->findFirst(" id = '$codigo_tipo_productos_de_investigacion' ");
				
				Tag::displayTo("codigo_tipo_productos_de_investigacion",$tipo_productoinv->getId());
				Tag::displayTo("nombre_tipo_productos_de_investigacion",$tipo_productoinv->getDescripcionTipoInvestigacion());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		/*
		* modifica datos de las ies
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$tipo_productoinv  = new TipoProductoInvestigacion();
			//if($tipo_productoinv->count("id = '".$_REQUEST['codigo_tipo_productos_de_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$tipo_productoinv->setId($_REQUEST['codigo_tipo_productos_de_investigacion']); 
			$tipo_productoinv->setDescripcionTipoInvestigacion($_REQUEST['nombre_tipo_productos_de_investigacion']); 
			if($sw==0){					
				if($tipo_productoinv->save()){
					
					Flash::success(Router::getController()."   Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($tipo_productoinv->getMessages() as $message){
							  Flash::error($message->getMessage());
					}	  
					
				}
			}
					
	    }
		
		
		/*
		* Vista trae formulario de modificacion
		*/
		public function eliminarAction($id){
			//$this->setResponse("ajax");
			if( isset($id) ){	
				$codigo_tipo_productos_de_investigacion = $id;
		
				$tipo_productoinv  = $this->TipoProductoInvestigacion->findFirst(" id = '$codigo_tipo_productos_de_investigacion' ");
				
				Tag::displayTo("codigo_tipo_productos_de_investigacion",$tipo_productoinv->getId());
				Tag::displayTo("nombre_tipo_productos_de_investigacion",$tipo_productoinv->getDescripcionTipoInvestigacion());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$tipo_productoinv  = new TipoProductoInvestigacion();
			
				
				if($tipo_productoinv->delete(" id = '".$_REQUEST["codigo_tipo_productos_de_investigacion"]."' ")){
					
					Flash::success(Router::getController()."   Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					
					foreach($tipo_productoinv->getMessages() as $message){
							  Flash::error("Error Eliminando Ies ".$message->getMessage());
					}	  
					
				}
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
public function notFoundAction($actionName=''){
				$logger = new Logger("File", "notFoundReports.txt");
				$logger->log("No se encontró la acción $actionName");
			}


	}



?>