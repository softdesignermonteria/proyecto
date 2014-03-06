<?php

	class Flujo_de_cajaController extends ApplicationController {



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
			$filter = new Filter();
			//print $filter->applyFilter("a1b2c3d4e5", "digits"); // Imprime 12345
			/*$detalles_item = $_POST["detalles"];
			$detalles_item = $filter->apply($_POST["detalles"], array("Striptags")); // Imprime 12345
			$detalles_item = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$detalles_item)));

			Flash::notice($detalles_item);
			
			if($detalles_item!='[]'){	
				
				if(json_decode($detalles_item)){
					Flash::success("Json Correcto");
					$detalles_item = json_decode($detalles_item);
				}else{
					
					Flash::error("Error json");
					
				}
			}*/
								
			$sw=0;
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
								$caja = new FlujoCaja();
								$caja->setTransaction($transaction);
								
								
								$caja->setID(                      $_REQUEST["id"]);
								$caja->setCod_Proyecto(            $_REQUEST["codigo_proyecto"]);
								$caja->setIdentificacion(          $_REQUEST["codigo_investigador"]);
								$caja->setFacultadResponsable(     $_REQUEST["facultad_responsable"]);
								
								
								
								if($caja->save()==false){
									foreach($caja->getMessages() as $message){ 
										Flash::error("ERROR AGREGANDO EN TABLA Flujo de Caja: ".$message); 
									}
									$transaction->rollback();
								}else{
									Flash::success("PROYECTO GUARDADO SATISFACTORIAMENTE");
								}
							
								 /*gastos json*/
								$gastos = $filter->apply($_POST["gastos"], array("Striptags")); 
								$gastos = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$gastos)));
								if($gastos!='[]'){	
									if(json_decode($gastos)){
										Flash::success("Json Correcto: gastos");
										$gastos = json_decode($gastos);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: gastos");
										$transaction->rollback();
									}
								
								/* Agrega los gastos */
								foreach( $gastos as $items):
									
									$Gastos = new FlujoCajaDetalles();
									$Gastos->setTransaction($transaction);
									$Gastos->setId(0);
									$Gastos->setFlujo_caja_id($caja->getId());
									$Gastos->setRubro_id($items->codigo);
									$Gastos->setValor($items->valor);
									$Gastos->setAnnos($items->annos);
									$Gastos->setMeses($items->meses);
									$Gastos->setDescripcion_gastos($items->descripciongastos);
				
									if($Gastos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($Gastos->getMessages() as $message){ 
												Flash::error("Error Tabla Gastos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
							
								
								
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
				$cod_ies = $id;
		
				$FlujoCaja  = $this->FlujoCaja->findFirst(" id = '$id' ");
				$inv        = $this->TblInvestigador->findFirst(" Identificacion = '".$FlujoCaja->getIdentificacion()."' ");
				$pro        = $this->TblProyecto->findFirst(" Cod_Proyecto = '".$FlujoCaja->getCod_Proyecto()."' ");
				
				Tag::displayTo("id"                   ,$FlujoCaja->getId());
				Tag::displayTo("facultad_responsable" ,$FlujoCaja->getFacultadResponsable());
				Tag::displayTo("codigo_investigador"  ,$FlujoCaja->getIdentificacion());
				Tag::displayTo("nombre_investigador"  ,$inv->getPrimerNombre()." ".$inv->getSegundoNombre()." ".$inv->getPrimerApellido()." ".$inv->getSegundoApellido());
				Tag::displayTo("codigo_proyecto"      ,$FlujoCaja->getCod_Proyecto());
				Tag::displayTo("nombre_proyecto"      ,$pro->getTituloProyecto());
				
				$this->SetParamToview("gastos",$this->FlujoCajaDetalles->find(" flujo_caja_id = '$id' "));
				
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		/*
		* modifica datos de las ies
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$filter = new Filter();
			
								
			$sw=0;
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
								$caja = new FlujoCaja();
								$caja->setTransaction($transaction);
								
								
								$caja->setID(                      $_REQUEST["id"]);
								$caja->setCod_Proyecto(            $_REQUEST["codigo_proyecto"]);
								$caja->setIdentificacion(          $_REQUEST["codigo_investigador"]);
								$caja->setFacultadResponsable(     $_REQUEST["facultad_responsable"]);
								
								
								
								if($caja->save()==false){
									foreach($caja->getMessages() as $message){ 
										Flash::error("ERROR MODIFICANDO EN TABLA Flujo de Caja: ".$message); 
									}
									$transaction->rollback();
								}else{
									Flash::success("FLUJO DE CAJA GUARDADO SATISFACTORIAMENTE");
								}
								
								//Flash::notice(" flujo_caja_id = '".$caja->getId()."' ");
								$BGastos = new FlujoCajaDetalles();
								$BGastos->setTransaction($transaction);
								if( !$BGastos->delete(" flujo_caja_id = '".$caja->getId()."' ") ){
									foreach($BGastos->getMessages() as $message){ 
											Flash::error("Error Eliminado Detalle Flujo de Caja : ".$message); 
										}
									$transaction->rollback();
								}
							
								 /*gastos json*/
								$gastos = $filter->apply($_POST["gastos"], array("Striptags")); 
								$gastos = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$gastos)));
								if($gastos!='[]'){	
									if(json_decode($gastos)){
										Flash::success("Json Correcto: gastos");
										$gastos = json_decode($gastos);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: gastos");
										$transaction->rollback();
									}
								
								/* Agrega los gastos */
								foreach( $gastos as $items):
									
									$Gastos = new FlujoCajaDetalles();
									$Gastos->setTransaction($transaction);
									$Gastos->setId(0);
									$Gastos->setFlujo_caja_id($caja->getId());
									$Gastos->setRubro_id($items->codigo);
									$Gastos->setValor($items->valor);
									$Gastos->setAnnos($items->annos);
									$Gastos->setMeses($items->meses);
									$Gastos->setDescripcion_gastos($items->descripciongastos);
				
									if($Gastos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($Gastos->getMessages() as $message){ 
												Flash::error("Error Tabla Gastos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
							
								
								
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
		public function eliminarAction($id){
			if( isset($id) ){	
				$cod_ies = $id;
		
				$FlujoCaja  = $this->FlujoCaja->findFirst(" id = '$id' ");
				$inv        = $this->TblInvestigador->findFirst(" Identificacion = '".$FlujoCaja->getIdentificacion()."' ");
				$pro        = $this->TblProyecto->findFirst(" Cod_Proyecto = '".$FlujoCaja->getCod_Proyecto()."' ");
				
				Tag::displayTo("id"                   ,$FlujoCaja->getId());
				Tag::displayTo("facultad_responsable" ,$FlujoCaja->getFacultadResponsable());
				Tag::displayTo("codigo_investigador"  ,$FlujoCaja->getIdentificacion());
				Tag::displayTo("nombre_investigador"  ,$inv->getPrimerNombre()." ".$inv->getSegundoNombre()." ".$inv->getPrimerApellido()." ".$inv->getSegundoApellido());
				Tag::displayTo("codigo_proyecto"      ,$FlujoCaja->getCod_Proyecto());
				Tag::displayTo("nombre_proyecto"      ,$pro->getTituloProyecto());
				
				$this->SetParamToview("gastos",$this->FlujoCajaDetalles->find(" flujo_caja_id = '$id' "));
				
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			$filter = new Filter();
			
								
			$sw=0;
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
								
								$BGastos = new FlujoCajaDetalles();
								$BGastos->setTransaction($transaction);
								if( $BGastos->delete(" flujo_caja_id = '".$caja->getID."' ") ){
									foreach($BGastos->getMessages() as $message){ 
											Flash::error("Error Eliminado Detalle Flujo de Caja : ".$message); 
										}
									$transaction->rollback();
								}
							
								$Caja = new FlujoCaja();
								$Caja->setTransaction($transaction);
								if( $Caja->delete(" id = '".$caja->getID."' ") ){
									foreach($Caja->getMessages() as $message){ 
											Flash::error("Error Eliminado Flujo de Caja : ".$message); 
										}
									$transaction->rollback();
								}	
								
							Flash::success(" Flujo de Caja Borrado Satisfactoriamente");	
							$transaction->commit();
							echo "<script>quitar_mensajes();</script>";
							
					}catch(DbContraintViolationException $e){
						Flash::error($e->getMessage());
						//Flash::error("NO SE PUEDE BORRAR PRODUCTO");
						Flash::error("NO SE PUEDE BORRAR ESTE REGISTRO: viola restriccion de llave foranea");
					}catch(DbException $e){
					//Flash::error($e->getMessage());
							Flash::error("NO SE PUEDE BORRAR ESTE REGISTRO: viola restriccion de llave foranea");	
						
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
					//cierre cacth try
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
		



	}



?>