<?php

	class Centros_de_produccionController extends ApplicationController {



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

		 * Aqui sale el formulario de Iniciar Sesi�n

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
			$ies  = new TblObjetivoSocioeconomico();
			if($ies->count("Cod_Objetivo_Socioeconomico = '".$_REQUEST['cod_objetivo']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$ies->setCodObjetivoSocioeconomico($_REQUEST['cod_objetivo']); 
			$ies->setDescripcionObjetivoSocioeconomico($_REQUEST['nombre_objetivo']); 
			if($sw==0){					
				if($ies->save()){
					
					Flash::success("Objetivo Socioeconomico Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($ies->getMessages() as $message){
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
				$cod_objetivo = $id;
		
				$ies  = $this->TblObjetivoSocioeconomico->findFirst(" Cod_Objetivo_Socioeconomico = '$cod_objetivo' ");
				
				Tag::displayTo("cod_objetivo",$ies->getCodObjetivoSocioeconomico());
				Tag::displayTo("nombre_objetivo",$ies->getDescripcionObjetivoSocioeconomico());
				
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
			$ies  = new TblObjetivoSocioeconomico();
			//if($ies->count("Cod_Objetivo_Socioeconomico = '".$_REQUEST['cod_objetivo']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$ies->setCodObjetivoSocioeconomico($_REQUEST['cod_objetivo']); 
			$ies->setDescripcionObjetivoSocioeconomico($_REQUEST['nombre_objetivo']); 
			if($sw==0){					
				if($ies->save()){
					
					Flash::success("Objetivo Socioeconomico Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($ies->getMessages() as $message){
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
				$cod_objetivo = $id;
		
				$ies  = $this->TblObjetivoSocioeconomico->findFirst(" Cod_Objetivo_Socioeconomico = '$cod_objetivo' ");
				
				Tag::displayTo("cod_objetivo",$ies->getCodObjetivoSocioeconomico());
				Tag::displayTo("nombre_objetivo",$ies->getDescripcionObjetivoSocioeconomico());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$ies  = new TblObjetivoSocioeconomico();
			
				
				if($ies->delete(" Cod_Objetivo_Socioeconomico = '".$_REQUEST["cod_objetivo"]."' ")){
					
					Flash::success("Objetivo Socioeconomico Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($ies->getMessages() as $message){
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
				Flash::notice("Lo sentimos la p�gina no existe");
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
		//Se relanza la excepci�n
			throw $e;
			Router::routeTo("controller: home", "action: error");
		}
		
	}
	
	
					
			public function notFoundAction($actionName=''){
				$logger = new Logger("File", "notFoundReports.txt");
				$logger->log("No se encontr� la acci�n $actionName");
			}



	}



?>