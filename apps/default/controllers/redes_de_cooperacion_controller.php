<?php

	class Redes_de_cooperacionController extends ApplicationController {



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
			$filter = new Filter();
			if($sw==0){		
		
				$transaction = new ActiveRecordTransaction(true);
					try{
						
						$transaction = TransactionManager::getUserTransaction(); 
						$red  = new TblRedCooperacion();
						$red->setTransaction($transaction);
						//if($red->count("Cod_Red_Cooperacion = '".$_REQUEST['codigo_redes_de_cooperacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
						$id = $_REQUEST['codigo_redes_de_cooperacion'];
						if($id==''){$id=0;}	
						$red->setCodRedCooperacion($id); 
						$red->setNombreRedCooperacion($_REQUEST['nombre_redes_de_cooperacion']); 
						$red->setFKCodIES($_REQUEST['cod_ies']); 
						$red->setFKCodNBC($_REQUEST['codigo_nbc']); 
						$red->setFechaCreacionRedCooperacion($_REQUEST['fecha_creacion']); 
							
						
						if($red->save()){
							Flash::success(Router::getController()."  Guardada Satisfactoriamente");
						}else{
							Flash::error("Error: No se pudo Guardar el registro...");	
							foreach($red->getMessages() as $message){
									  Flash::error($message->getMessage());
							}//cierra guardar red	
							$transaction->rollback();
						}
						
								
							 /*ies_nacionales_integrantes_de_red json*/
							$ies_nacionales_integrantes_de_red = $filter->apply($_POST["ies_nacionales_integrantes_de_red"], array("Striptags")); 
							$ies_nacionales_integrantes_de_red = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$ies_nacionales_integrantes_de_red)));
							if($ies_nacionales_integrantes_de_red!='[]'){	
								if(json_decode($ies_nacionales_integrantes_de_red)){
									Flash::success("Json Correcto: ies_nacionales_integrantes_de_red");
									$ies_nacionales_integrantes_de_red = json_decode($ies_nacionales_integrantes_de_red);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: ies_nacionales_integrantes_de_red");
									$transaction->rollback();
								}
							
								/* Agrega los ies_nacionales_integrantes_de_red */
								foreach( $ies_nacionales_integrantes_de_red as $items):
									
									$RedCooperacionIntegrantesRed = new TblRedCooperacionIntegrantesRed();
									$RedCooperacionIntegrantesRed->setTransaction($transaction);
									$RedCooperacionIntegrantesRed->setId('');
									$RedCooperacionIntegrantesRed->setFKCodRedCooperacion($red->getCodRedCooperacion());
									$RedCooperacionIntegrantesRed->setFKIdEntidadesIntegrantesRed($items->codigo);
									$RedCooperacionIntegrantesRed->setFechaAdicion($items->fechaadicion);
									$RedCooperacionIntegrantesRed->setFechaRetiro($items->fecharetiro);
				
									if($RedCooperacionIntegrantesRed->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($RedCooperacionIntegrantesRed->getMessages() as $message){ 
												Flash::error("Error Tabla RedCooperacionIntegrantesRed : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
							}
						
						
						//si todo bien
						Flash::success("proyecto Guardado Satisfactoriamente");	
						$transaction->commit();
						echo "<script>quitar_mensajes();</script>";
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
					//cierre cacth try
					}  
			
			}
					
	    }
		
		
		/*
		* Vista trae formulario de modificacion
		*/
		public function modificarAction($id){
			//$this->setResponse("ajax");
			if( isset($id) ){	
				$codigo_redes_de_cooperacion = $id;
		
				$red  = $this->TblRedCooperacion->findFirst(" Cod_Red_Cooperacion = '$codigo_redes_de_cooperacion' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$red->getFKCodIES()."' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$red->getFKCodNBC()."' ");
				
				Tag::displayTo("codigo_redes_de_cooperacion",$red->getCodRedCooperacion());
				Tag::displayTo("nombre_redes_de_cooperacion",$red->getNombreRedCooperacion());
				Tag::displayTo("cod_ies"                    ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"                 ,$ies->getNombreIES());
				Tag::displayTo("codigo_nbc"                 ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"                 ,$nbc->getDescripcionNBC());
				Tag::displayTo("fecha_creacion"             ,$red->getFechaCreacionRedCooperacion());
				$this->setParamToView("tabla_rcir",$this->TblRedCooperacionIntegrantesRed->find(" FK_Cod_Red_Cooperacion = '$codigo_redes_de_cooperacion' "));
				
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
			$filter = new Filter();
			if($sw==0){		
		
				$transaction = new ActiveRecordTransaction(true);
					try{
						
						$transaction = TransactionManager::getUserTransaction(); 
						$red  = new TblRedCooperacion();
						$red->setTransaction($transaction);
						//if($red->count("Cod_Red_Cooperacion = '".$_REQUEST['codigo_redes_de_cooperacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
						$id = $_REQUEST['codigo_redes_de_cooperacion'];
						if($id==''){$id=0;}	
						$red->setCodRedCooperacion($id); 
						$red->setNombreRedCooperacion($_REQUEST['nombre_redes_de_cooperacion']); 
						$red->setFKCodIES($_REQUEST['cod_ies']); 
						$red->setFKCodNBC($_REQUEST['codigo_nbc']); 
						$red->setFechaCreacionRedCooperacion($_REQUEST['fecha_creacion']); 
							
						
						if($red->save()){
							Flash::success(Router::getController()."  Guardada Satisfactoriamente");
						}else{
							Flash::error("Error: No se pudo Guardar el registro...");	
							foreach($red->getMessages() as $message){
									  Flash::error($message->getMessage());
							}//cierra guardar red	
							$transaction->rollback();
						}
						
							
							$ies_nal = new TblRedCooperacionIntegrantesRed();
							$ies_nal->setTransaction($transaction);
							if( !$ies_nal->delete(" FK_Cod_Red_Cooperacion = '".$red->getCodRedCooperacion()."' ") ){
								/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									foreach($ies_nal->getMessages() as $message){ 
										Flash::error("Error Tabla RedCooperacionIntegrantesRed : ".$message); 
									}
									$transaction->rollback();
								}
								
							 /*ies_nacionales_integrantes_de_red json*/
							$ies_nacionales_integrantes_de_red = $filter->apply($_POST["ies_nacionales_integrantes_de_red"], array("Striptags")); 
							$ies_nacionales_integrantes_de_red = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$ies_nacionales_integrantes_de_red)));
							if($ies_nacionales_integrantes_de_red!='[]'){	
								if(json_decode($ies_nacionales_integrantes_de_red)){
									Flash::success("Json Correcto: ies_nacionales_integrantes_de_red");
									$ies_nacionales_integrantes_de_red = json_decode($ies_nacionales_integrantes_de_red);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: ies_nacionales_integrantes_de_red");
									$transaction->rollback();
								}
							
								/* Agrega los ies_nacionales_integrantes_de_red */
								foreach( $ies_nacionales_integrantes_de_red as $items):
									
									$RedCooperacionIntegrantesRed = new TblRedCooperacionIntegrantesRed();
									$RedCooperacionIntegrantesRed->setTransaction($transaction);
									$RedCooperacionIntegrantesRed->setId('');
									$RedCooperacionIntegrantesRed->setFKCodRedCooperacion($red->getCodRedCooperacion());
									$RedCooperacionIntegrantesRed->setFKIdEntidadesIntegrantesRed($items->codigo);
									$RedCooperacionIntegrantesRed->setFechaAdicion($items->fechaadicion);
									$RedCooperacionIntegrantesRed->setFechaRetiro($items->fecharetiro);
				
									if($RedCooperacionIntegrantesRed->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($RedCooperacionIntegrantesRed->getMessages() as $message){ 
												Flash::error("Error Tabla RedCooperacionIntegrantesRed : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
							}
						
						
						//si todo bien
						Flash::success("Red de Cooperacion Guardadada Satisfactoriamente");	
						$transaction->commit();
						echo "<script>quitar_mensajes();</script>";
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
					//cierre cacth try
					}  
			
			}	
	    }
		
		
		/*
		* Vista trae formulario de modificacion
		*/
		public function eliminarAction($id){
			//$this->setResponse("ajax");
			if( isset($id) ){	
				$codigo_redes_de_cooperacion = $id;
		
				$red  = $this->TblRedCooperacion->findFirst(" Cod_Red_Cooperacion = '$codigo_redes_de_cooperacion' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$red->getFKCodIES()."' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$red->getFKCodNBC()."' ");
				
				Tag::displayTo("codigo_redes_de_cooperacion",$red->getCodRedCooperacion());
				Tag::displayTo("nombre_redes_de_cooperacion",$red->getNombreRedCooperacion());
				Tag::displayTo("cod_ies"                    ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"                 ,$ies->getNombreIES());
				Tag::displayTo("codigo_nbc"                 ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"                 ,$nbc->getDescripcionNBC());
				Tag::displayTo("fecha_creacion"             ,$red->getFechaCreacionRedCooperacion());
				$this->setParamToView("tabla_rcir",$this->TblRedCooperacionIntegrantesRed->find(" FK_Cod_Red_Cooperacion = '$codigo_redes_de_cooperacion' "));
							
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			
			$red  = new TblRedCooperacion();
			$red2 = new TblRedCooperacionIntegrantesRed();
			try{	
				if($red->delete(" Cod_Red_Cooperacion = '".$_REQUEST["codigo_redes_de_cooperacion"]."' ")){
					Flash::success(Router::getController()."  Eliminada Satisfactoriamente");
					if($red2->delete(" FK_Cod_Red_Cooperacion = '".$_REQUEST["codigo_redes_de_cooperacion"]."' ")){
						Flash::success(Router::getController()." RedCooperacionIntegrantesRed Eliminada Satisfactoriamente");
					}else{
							Flash::error("Error: No se pudo Eliminar .");	
								foreach($red->getMessages() as $message){
										  Flash::error("Error Eliminando  ".$message->getMessage());
								}	  	
						}
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($red->getMessages() as $message){
							  Flash::error("Error Eliminando  ".$message->getMessage());
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

public function notFoundAction($actionName=''){
				$logger = new Logger("File", "notFoundReports.txt");
				$logger->log("No se encontró la acción $actionName");
			}

	}



?>