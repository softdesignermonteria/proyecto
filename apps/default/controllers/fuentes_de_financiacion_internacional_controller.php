<?php

	class Fuentes_de_financiacion_internacionalController extends ApplicationController {



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
			$fuentinter  = new TblFuenteFinanciacionInternacional();
			//if($fuentinter->count("Cod_Fuente_Financiacion_Internacional = '".$_REQUEST['codigo_fuentes_de_financiacion_internacional']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_fuentes_de_financiacion_internacional'];
			if($id==''){$id=0;}	

			$fuentinter->setCodFuenteFinanciacionInternacional($id); 
			$fuentinter->setDescripcionFuenteFinanciacionInternacional($_REQUEST['nombre_fuentes_de_financiacion_internacional']); 
			$fuentinter->setFK_Cod_Sector_Entidad($_REQUEST['codigo_sector_entidad']); 
			
			if($sw==0){					
				if($fuentinter->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($fuentinter->getMessages() as $message){
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
				$codigo_fuentes_de_financiacion_internacional = $id;
		
				$ies  = $this->TblFuenteFinanciacionInternacional->findFirst(" Cod_Fuente_Financiacion_Internacional = '$codigo_fuentes_de_financiacion_internacional' ");
				$sec  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$ies->getFK_Cod_Sector_Entidad()."' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$sec->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_fuentes_de_financiacion_internacional",$ies->getCodFuenteFinanciacionInternacional());
				Tag::displayTo("nombre_fuentes_de_financiacion_internacional",$ies->getDescripcionFuenteFinanciacionInternacional());
				
				Tag::displayTo("codigo_sector_entidad",$sec->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sec->getDescripcionSectorEntidad());
				
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				
				
				
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
			$fuentinter  = new TblFuenteFinanciacionInternacional();
			//if($ies->count("Cod_Fuente_Financiacion_Internacional = '".$_REQUEST['codigo_fuentes_de_financiacion_internacional']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$fuentinter->setCodFuenteFinanciacionInternacional($_REQUEST['codigo_fuentes_de_financiacion_internacional']); 
			$fuentinter->setDescripcionFuenteFinanciacionInternacional($_REQUEST['nombre_fuentes_de_financiacion_internacional']); 
			$fuentinter->setFK_Cod_Sector_Entidad($_REQUEST['codigo_sector_entidad']); 
			
			if($sw==0){					
				if($fuentinter->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($fuentinter->getMessages() as $message){
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
				$codigo_fuentes_de_financiacion_internacional = $id;
		
				$ies  = $this->TblFuenteFinanciacionInternacional->findFirst(" Cod_Fuente_Financiacion_Internacional = '$codigo_fuentes_de_financiacion_internacional' ");
				$sec  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$ies->getFK_Cod_Sector_Entidad()."' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$sec->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_fuentes_de_financiacion_internacional",$ies->getCodFuenteFinanciacionInternacional());
				Tag::displayTo("nombre_fuentes_de_financiacion_internacional",$ies->getDescripcionFuenteFinanciacionInternacional());
				
				Tag::displayTo("codigo_sector_entidad",$sec->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sec->getDescripcionSectorEntidad());
				
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$fuentinter  = new TblFuenteFinanciacionInternacional();
			
				
				if($fuentinter->delete(" Cod_Fuente_Financiacion_Internacional = '".$_REQUEST["codigo_fuentes_de_financiacion_internacional"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($fuentinter->getMessages() as $message){
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