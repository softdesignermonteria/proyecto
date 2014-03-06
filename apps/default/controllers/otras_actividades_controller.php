<?php

	class Otras_actividadesController extends ApplicationController {



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

				 $this->setResponse('view');

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

				$this->setResponse('view');

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
			$sw=0;
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
							$activ = new TblActividadesInvestigacion();
							$activ->setTransaction($transaction);
							
							$id = $_REQUEST['codigo_actividades_investigacion'];
							if($id==''){$id=0;}	
				
							$activ->setCodActividadesInvestigacion('0'); 
							$activ->setDescripcionActividadesInvestigacion($_REQUEST['nombre_actividades_investigacion']); 
							$activ->setCodIES($_REQUEST['cod_ies']); 
							$activ->setAnnos($_REQUEST['annos']); 
							$activ->setSemestre($_REQUEST['semestre']); 
			
							if(!$activ->save()){
								Flash::error("Error: No se pudo Guardar el registro...");	
								foreach($activ->getMessages() as $message){
										  Flash::error($message->getMessage());
								}	
							}
							
							
						   /*fuentes_de_financiacion_nacional json*/
							$fuentes_de_financiacion_nacional = $filter->apply($_POST["fuentes_de_financiacion_nacional"], array("Striptags")); 
							$fuentes_de_financiacion_nacional = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$fuentes_de_financiacion_nacional)));
							if($fuentes_de_financiacion_nacional!='[]'){	
								
								if(json_decode($fuentes_de_financiacion_nacional)){
									Flash::success("Json Correcto: fuentes_de_financiacion_nacional");
									$fuentes_de_financiacion_nacional = json_decode($fuentes_de_financiacion_nacional);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: fuentes_de_financiacion_nacional");
									$transaction->rollback();
								}
								
									/* Agrega los fuentes_de_financiacion_nacional */
									foreach( $fuentes_de_financiacion_nacional as $items):
										
										$FinanciacionNacionalProyecto = new TblFuenteFNacionalActividades();
										$FinanciacionNacionalProyecto->setTransaction($transaction);
										$FinanciacionNacionalProyecto->setId('');
										$FinanciacionNacionalProyecto->setFKCodFuenteFNacional($items->codigo);
										$FinanciacionNacionalProyecto->setValor($items->valor);
										$FinanciacionNacionalProyecto->setFKCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
					
										if($FinanciacionNacionalProyecto->save()==false){
												/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
												foreach($FinanciacionNacionalProyecto->getMessages() as $message){ 
													Flash::error("Error Tabla TblFuenteFNacionalActividades : ".$message); 
												}
												$transaction->rollback();
												
											}	
									endforeach;	
								}		
								
								 /*fuentes_de_financiacion_internacional json*/
								$fuentes_de_financiacion_internacional = $filter->apply($_POST["fuentes_de_financiacion_internacional"], array("Striptags")); 
								$fuentes_de_financiacion_internacional = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$fuentes_de_financiacion_internacional)));
								if($fuentes_de_financiacion_internacional!='[]'){	
									if(json_decode($fuentes_de_financiacion_internacional)){
										Flash::success("Json Correcto: fuentes_de_financiacion_internacional");
										$fuentes_de_financiacion_internacional = json_decode($fuentes_de_financiacion_internacional);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: fuentes_de_financiacion_internacional");
										$transaction->rollback();
									}
								
								/* Agrega los fuentes_de_financiacion_nacional */
								foreach( $fuentes_de_financiacion_internacional as $items):
									
									$FuenteFInternacionalProyecto = new TblFuenteFInternacionalActividades();
									$FuenteFInternacionalProyecto->setTransaction($transaction);
									$FuenteFInternacionalProyecto->setId('');
									$FuenteFInternacionalProyecto->setFKCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
									$FuenteFInternacionalProyecto->setFKCodFuenteFInternacional($items->codigo);
									$FuenteFInternacionalProyecto->setValor($items->valor);
				
									if($FuenteFInternacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla TblFuenteFInternacionalActividades : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
								
								
								 /*gastos json*/
								$gastos = $filter->apply($_POST["fuentes_de_financiacion_internacional"], array("Striptags")); 
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
								
								/* Agrega los fuentes_de_financiacion_nacional */
								foreach( $gastos as $items):
									
									$gastos = new TblGastosActividades();
									$gastos->setTransaction($transaction);
									$gastos->setId('');
									$gastos->setFkCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
									$gastos->setFKCodTipoGasto($items->codigo);
									$gastos->setValor($items->valor);
				
									if($gastos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($gastos->getMessages() as $message){ 
												Flash::error("Error Tabla TblFuenteFInternacionalActividades : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
							
						
							Flash::success("Actividad de Investigacion creada Satisfactoriamente");	
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
				$codigo_actividades_investigacion = $id;
		
				$ies  = $this->TblActividadesInvestigacion->findFirst(" Cod_Actividades_Investigacion = '$id' ");
				
				Tag::displayTo("codigo_actividades_investigacion",$ies->getCodActividadesInvestigacion());
				Tag::displayTo("nombre_actividades_investigacion",$ies->getDescripcionActividadesInvestigacion());
				Tag::displayTo("cod_ies",$ies->getCodIES());
				Tag::displayTo("annos",$ies->getAnnos());
				Tag::displayTo("semestre",$ies->getSemestre());
				
				$this->setParamToView("fnacional"       ,$this->TblFuenteFNacionalActividades->find(" FK_Cod_Actividades_Investigacion = '".$id."' "));
				$this->setParamToView("finternacional"  ,$this->TblFuenteFInternacionalActividades->find(" FK_Cod_Actividades_Investigacion = '".$id."' "));
				$this->setParamToView("gastos"  ,$this->TblGastosActividades->find(" Fk_Cod_Actividades_Investigacion = '".$id."' "));

			}else{
				Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
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
							
							$activ = new TblActividadesInvestigacion();
							$activ->setTransaction($transaction);
							 
							
							$id = $_REQUEST['codigo_actividades_investigacion'];
							
				
							$activ->setCodActividadesInvestigacion($id); 
							$activ->setDescripcionActividadesInvestigacion($_REQUEST['nombre_actividades_investigacion']);
							$activ->setCodIES($_REQUEST['cod_ies']); 
							$activ->setAnnos($_REQUEST['annos']); 
							$activ->setSemestre($_REQUEST['semestre']); 
							
							if(!$activ->save()){
								Flash::error("Error: No se pudo Guardar el registro...");	
								foreach($pais->getMessages() as $message){
										  Flash::error($message->getMessage());
								}	
							}
							
							//*** borrar TblFinanciacionNacionalProyecto
								$FinanciacionNacionalProyecto2 = new TblFuenteFNacionalActividades();
								$FinanciacionNacionalProyecto2->setTransaction($transaction);
								if(!$FinanciacionNacionalProyecto2->delete(" FK_Cod_Actividades_Investigacion = '".$activ->getCodActividadesInvestigacion()."' ")){
										foreach($FinanciacionNacionalProyecto2->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblFinanciacionNacionalProyecto : ".$message); 
										}
										$transaction->rollback();
									}
							
						   /*fuentes_de_financiacion_nacional json*/
							$fuentes_de_financiacion_nacional = $filter->apply($_POST["fuentes_de_financiacion_nacional"], array("Striptags")); 
							$fuentes_de_financiacion_nacional = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$fuentes_de_financiacion_nacional)));
							if($fuentes_de_financiacion_nacional!='[]'){	
								
								if(json_decode($fuentes_de_financiacion_nacional)){
									Flash::success("Json Correcto: fuentes_de_financiacion_nacional");
									$fuentes_de_financiacion_nacional = json_decode($fuentes_de_financiacion_nacional);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: fuentes_de_financiacion_nacional");
									$transaction->rollback();
								}
								
									/* Agrega los fuentes_de_financiacion_nacional */
									foreach( $fuentes_de_financiacion_nacional as $items):
										
										$FinanciacionNacionalProyecto = new TblFuenteFNacionalActividades();
										$FinanciacionNacionalProyecto->setTransaction($transaction);
										$FinanciacionNacionalProyecto->setId('');
										$FinanciacionNacionalProyecto->setFKCodFuenteFNacional($items->codigo);
										$FinanciacionNacionalProyecto->setValor($items->valor);
										$FinanciacionNacionalProyecto->setFKCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
					
										if($FinanciacionNacionalProyecto->save()==false){
												/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
												foreach($FinanciacionNacionalProyecto->getMessages() as $message){ 
													Flash::error("Error Tabla TblFuenteFNacionalActividades : ".$message); 
												}
												$transaction->rollback();
												
											}	
									endforeach;	
								}	
								
								//*** borrar TblFuenteFInternacionalProyecto
								$FuenteFInternacionalProyecto = new TblFuenteFInternacionalActividades();
								$FuenteFInternacionalProyecto->setTransaction($transaction);
								if(!$FuenteFInternacionalProyecto->delete(" FK_Cod_Actividades_Investigacion = '".$activ->getCodActividadesInvestigacion()."' ")){
										foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblFuenteFInternacionalProyecto : ".$message); 
										}
										$transaction->rollback();
									}		
								
								 /*fuentes_de_financiacion_internacional json*/
								$fuentes_de_financiacion_internacional = $filter->apply($_POST["fuentes_de_financiacion_internacional"], array("Striptags")); 
								$fuentes_de_financiacion_internacional = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$fuentes_de_financiacion_internacional)));
								if($fuentes_de_financiacion_internacional!='[]'){	
									if(json_decode($fuentes_de_financiacion_internacional)){
										Flash::success("Json Correcto: fuentes_de_financiacion_internacional");
										$fuentes_de_financiacion_internacional = json_decode($fuentes_de_financiacion_internacional);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: fuentes_de_financiacion_internacional");
										$transaction->rollback();
									}
								
								/* Agrega los fuentes_de_financiacion_nacional */
								foreach( $fuentes_de_financiacion_internacional as $items):
									
									$FuenteFInternacionalProyecto = new TblFuenteFInternacionalActividades();
									$FuenteFInternacionalProyecto->setTransaction($transaction);
									$FuenteFInternacionalProyecto->setId('');
									$FuenteFInternacionalProyecto->setFKCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
									$FuenteFInternacionalProyecto->setFKCodFuenteFInternacional($items->codigo);
									$FuenteFInternacionalProyecto->setValor($items->valor);
				
									if($FuenteFInternacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla TblFuenteFInternacionalActividades : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}	
								
								//*** borrar TblFuenteFInternacionalProyecto
								$TblGastosActividades = new TblGastosActividades();
								$TblGastosActividades->setTransaction($transaction);
								if(!$TblGastosActividades->delete(" Fk_Cod_Actividades_Investigacion = '".$activ->getCodActividadesInvestigacion()."' ")){
										foreach($TblGastosActividades->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla gastos : ".$message); 
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
								
								/* Agrega los fuentes_de_financiacion_nacional */
								foreach( $gastos as $items):
									
									$gastos = new TblGastosActividades();
									$gastos->setTransaction($transaction);
									$gastos->setId('');
									$gastos->setFkCodActividadesInvestigacion($activ->getCodActividadesInvestigacion());
									$gastos->setFKCodTipoGasto($items->codigo);
									$gastos->setValor($items->valor);
				
									if($gastos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($gastos->getMessages() as $message){ 
												Flash::error("Error Tabla gastos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}			
							
						
							Flash::success("Actividad de Investigacion creada Satisfactoriamente");	
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
				$codigo_actividades_investigacion = $id;
		
				$ies  = $this->TblActividadesInvestigacion->findFirst(" Cod_Actividades_Investigacion = '$id' ");
				
				Tag::displayTo("codigo_actividades_investigacion",$ies->getCodActividadesInvestigacion());
				Tag::displayTo("nombre_actividades_investigacion",$ies->getDescripcionActividadesInvestigacion());
				Tag::displayTo("cod_ies",$ies->getCodIES());
				Tag::displayTo("annos",$ies->getAnnos());
				Tag::displayTo("semestre",$ies->getSemestre());
				
				$this->setParamToView("fnacional"       ,$this->TblFuenteFNacionalActividades->find(" FK_Cod_Actividades_Investigacion = '".$id."' "));
				$this->setParamToView("finternacional"  ,$this->TblFuenteFInternacionalActividades->find(" FK_Cod_Actividades_Investigacion = '".$id."' "));
				$this->setParamToView("gastos"  ,$this->TblGastosActividades->find(" Fk_Cod_Actividades_Investigacion = '".$id."' "));

			}else{
				Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
			}
				
		}
		
		public function deleteAction($id){
			
			
			
			$this->setResponse('view');
			try{
			$TblActividadesInvestigacion  = new TblActividadesInvestigacion();
				
				//*** borrar TblFuenteFInternacionalProyecto
					$FuenteFInternacionalProyecto = new TblFuenteFInternacionalActividades();

					if(!$FuenteFInternacionalProyecto->delete(" FK_Cod_Actividades_Investigacion = '".$id."' ")){
							foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
								Flash::error("Error Eliminado Tabla TblFuenteFInternacionalProyecto : ".$message); 
							}

						}	
						
						
					//*** borrar TblFinanciacionNacionalProyecto
					$FinanciacionNacionalProyecto2 = new TblFuenteFNacionalActividades();
				
					if(!$FinanciacionNacionalProyecto2->delete(" FK_Cod_Actividades_Investigacion = '".$id."' ")){
							foreach($FinanciacionNacionalProyecto2->getMessages() as $message){ 
								Flash::error("Error Eliminado Tabla TblFinanciacionNacionalProyecto : ".$message); 
							}
						}		
						
					//*** borrar TblFinanciacionNacionalProyecto
					$TblGastosActividades = new TblGastosActividades();
				
					if(!$TblGastosActividades->delete(" Fk_Cod_Actividades_Investigacion = '".$id."' ")){
							foreach($TblGastosActividades->getMessages() as $message){ 
								Flash::error("Error Eliminado Tabla TblGastosActividades : ".$message); 
							}
						}			
						
				
				if($TblActividadesInvestigacion->delete(" Cod_Actividades_Investigacion = '".$_REQUEST["codigo_actividades_investigacion"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($pais->getMessages() as $message){
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
		



	}



?>