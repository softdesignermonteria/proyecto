<?php

	class Tipo_participacion_proyectoController extends ApplicationController {



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
			$pais  = new TblTipoParticipacionProyecto();
			//if($pais->count("Cod_Tipo_Participacion_Proyecto = '".$_REQUEST['codigo_tipo_participacion_proyecto']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_tipo_participacion_proyecto'];
			if($id==''){$id=0;}	

			$pais->setCodTipoParticipacionProyecto($id); 
			$pais->setDescripcionTipoParticipacionProyecto($_REQUEST['nombre_tipo_participacion_proyecto']); 
			
			if($sw==0){					
				if($pais->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($pais->getMessages() as $message){
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
				$codigo_tipo_participacion_proyecto = $id;
		
				$ies  = $this->TblTipoParticipacionProyecto->findFirst(" Cod_Tipo_Participacion_Proyecto = '$codigo_tipo_participacion_proyecto' ");
				
				Tag::displayTo("codigo_tipo_participacion_proyecto",$ies->getCodTipoParticipacionProyecto());
				Tag::displayTo("nombre_tipo_participacion_proyecto",$ies->getDescripcionTipoParticipacionProyecto());
				
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
			$pais  = new TblTipoParticipacionProyecto();
			//if($ies->count("Cod_Tipo_Participacion_Proyecto = '".$_REQUEST['codigo_tipo_participacion_proyecto']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$pais->setCodTipoParticipacionProyecto($_REQUEST['codigo_tipo_participacion_proyecto']); 
			$pais->setDescripcionTipoParticipacionProyecto($_REQUEST['nombre_tipo_participacion_proyecto']); 
			if($sw==0){					
				if($pais->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($pais->getMessages() as $message){
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
				$codigo_tipo_participacion_proyecto = $id;
		
				$pais  = $this->TblTipoParticipacionProyecto->findFirst(" Cod_Tipo_Participacion_Proyecto = '$codigo_tipo_participacion_proyecto' ");
				
				Tag::displayTo("codigo_tipo_participacion_proyecto",$pais->getCodTipoParticipacionProyecto());
				Tag::displayTo("nombre_tipo_participacion_proyecto",$pais->getDescripcionTipoParticipacionProyecto());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$pais  = new TblTipoParticipacionProyecto();
			
				
				if($pais->delete(" Cod_Tipo_Participacion_Proyecto = '".$_REQUEST["codigo_tipo_participacion_proyecto"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($pais->getMessages() as $message){
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