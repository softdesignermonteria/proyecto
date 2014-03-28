<?php

	class Nivel_educativoController extends ApplicationController {



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
			$nivel_educ  = new TblNivelEducativo();
			if($nivel_educ->count("id = '".$_REQUEST['codigo_nivel_educativo']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_nivel_educativo'];
			if($id==''){$id=0;}	

			$nivel_educ->setId($id); 
			$nivel_educ->setDescripcion($_REQUEST['nombre_nivel_educativo']); 
			
			if($sw==0){					
				if($nivel_educ->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($nivel_educ->getMessages() as $message){
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
				$codigo_nivel_educativo = $id;
		
				$ies  = $this->TblNivelEducativo->findFirst(" id = '$codigo_nivel_educativo' ");
				
				Tag::displayTo("codigo_nivel_educativo",$ies->getId());
				Tag::displayTo("nombre_nivel_educativo",$ies->getDescripcion());
				
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
			$nivel_educ  = new TblNivelEducativo();
			//if($ies->count("id = '".$_REQUEST['codigo_nivel_educativo']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$nivel_educ->setId($_REQUEST['codigo_nivel_educativo']); 
			$nivel_educ->setDescripcion($_REQUEST['nombre_nivel_educativo']); 
			if($sw==0){					
				if($nivel_educ->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($nivel_educ->getMessages() as $message){
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
			try{
			if( isset($id) ){	
				$codigo_nivel_educativo = $id;
		
				$nivel_educ  = $this->TblNivelEducativo->findFirst(" id = '$codigo_nivel_educativo' ");
				
				Tag::displayTo("codigo_nivel_educativo",$nivel_educ->getId());
				Tag::displayTo("nombre_nivel_educativo",$nivel_educ->getDescripcion());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
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
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			
			$nivel_educ  = new TblNivelEducativo();
			
				
				if($nivel_educ->delete(" id = '".$_REQUEST["codigo_nivel_educativo"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($nivel_educ->getMessages() as $message){
							  Flash::error("Error Eliminando Ies ".$message->getMessage());
					}	  
					
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