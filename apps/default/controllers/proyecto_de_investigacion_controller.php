<?php

	class Proyecto_de_investigacionController extends ApplicationController {



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
							
							$proyecto = new TblProyecto();
							$proyecto->setTransaction($transaction);
							
							$proyecto->setCodProyecto(             $_REQUEST["cod_proyecto"]);
							$proyecto->setFKCodIES(                $_REQUEST["cod_ies"]);
							$proyecto->setTituloProyecto(          $_REQUEST["titulo_proyecto"]);
							$proyecto->setFechaInicioProyecto(     $_REQUEST["fecha_inicio_proyecto"]);
							$proyecto->setFKTipoProyecto(          $_REQUEST["codigo_tipo_proyecto"]);
							$proyecto->setDuracionProyecto(        $_REQUEST["cod_proyecto"]);
							$proyecto->setFKCodObjetoSocieconomico($_REQUEST["cod_objetivo"]);
							$proyecto->setObjetivoProyecto(        $_REQUEST["objetivo_proyecto"]);
							$proyecto->setResumenProyecto(         $_REQUEST["resumen_proyecto"]);
							$proyecto->setResultadosEsperados(     $_REQUEST["resultados_esperados"]);
							$proyecto->setValorProyecto(           $_REQUEST["valor_proyecto"]);
							
							
							if($proyecto->save()==false){
								foreach($proyecto->getMessages() as $message){ 
									Flash::error("ERROR AGREGANDO EN TABLA PROYECTO: ".$message); 
								}
								$transaction->rollback();
							}else{
								Flash::success("PROYECTO GUARDADO SATISFACTORIAMENTE");
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
									
									$FinanciacionNacionalProyecto = new TblFinanciacionNacionalProyecto();
									$FinanciacionNacionalProyecto->setTransaction($transaction);
									$FinanciacionNacionalProyecto->setId('');
									$FinanciacionNacionalProyecto->setFKCodProyecto($proyecto->getCodProyecto());
									$FinanciacionNacionalProyecto->setFKCodFuenteFNacional($items->codigo);
				
									if($FinanciacionNacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FinanciacionNacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla FinanciacionNacionalProyecto : ".$message); 
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
									
									$FuenteFInternacionalProyecto = new TblFuenteFInternacionalProyecto();
									$FuenteFInternacionalProyecto->setTransaction($transaction);
									$FuenteFInternacionalProyecto->setId('');
									$FuenteFInternacionalProyecto->setFKCodProyecto($proyecto->getCodProyecto());
									$FuenteFInternacionalProyecto->setFKCodFuenteFInternacional($items->codigo);
				
									if($FuenteFInternacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla FuenteFInternacionalProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
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
									
									$Gastos = new TblGastos();
									$Gastos->setTransaction($transaction);
									$Gastos->setCodGasto(0);
									$Gastos->setCodProyecto($proyecto->getCodProyecto());
									$Gastos->setValorGastos($items->valor);
									$Gastos->setFKCodTipoGastos($items->codigo);
				
									if($Gastos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($Gastos->getMessages() as $message){ 
												Flash::error("Error Tabla Gastos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
							
								/*grupos_investigacion json*/
								$grupos_investigacion = $filter->apply($_POST["grupos_investigacion"], array("Striptags")); 
								$grupos_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$grupos_investigacion)));
								if($grupos_investigacion!='[]'){	
									if(json_decode($grupos_investigacion)){
										Flash::success("Json Correcto: grupos_investigacion");
										$grupos_investigacion = json_decode($grupos_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: grupos_investigacion");
										$transaction->rollback();
									}
								
								/* Agrega los grupos_investigacion */
								foreach( $grupos_investigacion as $items):
									
									$GruposInvestigacionProyectos = new TblGruposInvestigacionProyectos();
									$GruposInvestigacionProyectos->setTransaction($transaction);
									$GruposInvestigacionProyectos->setId('');
									$GruposInvestigacionProyectos->setCodProyecto($proyecto->getCodProyecto());
									$GruposInvestigacionProyectos->setCodGrupoInvestigacion($items->codigo);
				
									if($GruposInvestigacionProyectos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($GruposInvestigacionProyectos->getMessages() as $message){ 
												Flash::error("Error Tabla GruposInvestigacionProyectos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
								/* Fin los grupos_investigacion */
								
								/*centros_investigacion json*/
								$centros_investigacion = $filter->apply($_POST["centros_investigacion"], array("Striptags")); 
								$centros_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$centros_investigacion)));
								if($centros_investigacion!='[]'){	
									if(json_decode($centros_investigacion)){
										Flash::success("Json Correcto: centros_investigacion");
										$centros_investigacion = json_decode($centros_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: centros_investigacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $centros_investigacion as $items):
									
									$CentrosInvestigacionProyectos = new TblCentrosInvestigacionProyectos();
									$CentrosInvestigacionProyectos->setTransaction($transaction);
									$CentrosInvestigacionProyectos->setId('');
									$CentrosInvestigacionProyectos->setCodProyecto($proyecto->getCodProyecto());
									$CentrosInvestigacionProyectos->setCodCentroInvestigacion($items->codigo);
				
									if($CentrosInvestigacionProyectos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($CentrosInvestigacionProyectos->getMessages() as $message){ 
												Flash::error(" TABLA CentrosInvestigacionProyectos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;
								}			
								/* Fin los centros_investigacion */
								
								/*redes_cooperacion json*/
								$redes_cooperacion = $filter->apply($_POST["redes_cooperacion"], array("Striptags")); 
								$redes_cooperacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$redes_cooperacion)));
								
								if($redes_cooperacion!='[]'){	
									if(json_decode($redes_cooperacion)){
										Flash::success("Json Correcto: redes_cooperacion");
										$redes_cooperacion = json_decode($redes_cooperacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: redes_cooperacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $redes_cooperacion as $items):
									
									$RedCooperacionProyecto = new TblRedCooperacionProyecto();
									$RedCooperacionProyecto->setTransaction($transaction);
									$RedCooperacionProyecto->setId('');
									$RedCooperacionProyecto->setCodProyecto($proyecto->getCodProyecto());
									$RedCooperacionProyecto->setCodRedCooperacion($items->codigo);
				
									if($RedCooperacionProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($RedCooperacionProyecto->getMessages() as $message){ 
												Flash::error(" TABLA RedCooperacionProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								
								}		
								/* Fin los redes_cooperacion */
								
								
								/*productos_investigacion json*/
								$productos_investigacion = $filter->apply($_POST["productos_investigacion"], array("Striptags")); 
								$productos_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$productos_investigacion)));
								if($productos_investigacion!='[]'){	
									if(json_decode($productos_investigacion)){
										Flash::success("Json Correcto: productos_investigacion");
										$productos_investigacion = json_decode($productos_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: productos_investigacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $productos_investigacion as $items):
									
									$ProyectoPorductoInvestigacion = new TblProyectoPorductoInvestigacion();
									$ProyectoPorductoInvestigacion->setTransaction($transaction);
									$ProyectoPorductoInvestigacion->setId('');
									$ProyectoPorductoInvestigacion->setCodProyecto($proyecto->getCodProyecto());
									$ProyectoPorductoInvestigacion->setCodProductoInvestigacion($items->codigo);
				
									if($ProyectoPorductoInvestigacion->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($ProyectoPorductoInvestigacion->getMessages() as $message){ 
												Flash::error(" TABLA ProyectoPorductoInvestigacion : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;		
								}	
								/* Fin los redes_cooperacion */
								
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
				$id = $id;
		
				$proyecto     = $this->TblProyecto->findFirst(" Cod_Proyecto = '$id' ");
				$ies          = $this->TblIes->findFirst(" Cod_IES = '".$proyecto->getFKCodIES()."' ");
				$tproyecto    = $this->TblTipoProyecto->findFirst(" Cod_Tipo_Proyecto = '".$proyecto->getFKTipoProyecto()."' ");
				$objetivo     = $this->TblObjetivoSocioeconomico->findFirst(" Cod_Objetivo_Socioeconomico = '".$proyecto->getFKCodObjetoSocieconomico()."' ");
				
				
				Tag::displayTo("cod_ies"               ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"            ,utf8_encode($ies->getNombreIES()));
				
				Tag::displayTo("cod_proyecto"          ,$proyecto->getCodProyecto());
				Tag::displayTo("titulo_proyecto"       ,utf8_encode($proyecto->getTituloProyecto()));
				Tag::displayTo("fecha_inicio_proyecto" ,$proyecto->getFechaInicioProyecto());
				Tag::displayTo("duracion_proyecto"     ,$proyecto->getDuracionProyecto());
				Tag::displayTo("fecha_inicio_proyecto" ,$proyecto->getFechaInicioProyecto());
				Tag::displayTo("duracion_proyecto"     ,$proyecto->getDuracionProyecto());
				Tag::displayTo("objetivo_proyecto"     ,utf8_encode($proyecto->getObjetivoProyecto()));
				Tag::displayTo("resumen_proyecto"      ,utf8_encode($proyecto->getResumenProyecto()));
				Tag::displayTo("resultados_esperados"  ,utf8_encode($proyecto->getResultadosEsperados()));
				Tag::displayTo("valor_proyecto"        ,$proyecto->getValorProyecto());
				
				Tag::displayTo("cod_objetivo"          ,$objetivo->getCodObjetivoSocioeconomico());
				Tag::displayTo("nombre_objetivo"       ,utf8_encode($objetivo->getDescripcionObjetivoSocioeconomico()));
				
				Tag::displayTo("codigo_tipo_proyecto"  ,$tproyecto->getCodTipoProyecto());
				Tag::displayTo("nombre_tipo_proyecto"  ,utf8_encode($tproyecto->getDescripcionTipoProyecto()));
				
				
				$this->setParamToView("fnacional"       ,$this->TblFinanciacionNacionalProyecto->find(" FK_Cod_Proyecto = '".$id."' "));
				$this->setParamToView("finternacional"  ,$this->TblFuenteFInternacionalProyecto->find(" FK_Cod_Proyecto = '".$id."' "));
				$this->setParamToView("gastos"          ,$this->TblGastos->find(" Cod_Proyecto = '".$id."'  "));
				$this->setParamToView("grupos"          ,$this->TblGruposInvestigacionProyectos->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("centros"         ,$this->TblCentrosInvestigacionProyectos->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("redes"           ,$this->TblRedCooperacionProyecto->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("productos"       ,$this->TblProyectoPorductoInvestigacion->find(" Cod_Proyecto = '".$id."' "));
		
				
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
							
							$proyecto = new TblProyecto();
							$proyecto->setTransaction($transaction);
							
							$proyecto->setCodProyecto(             $_REQUEST["cod_proyecto"]);
							$proyecto->setFKCodIES(                $_REQUEST["cod_ies"]);
							$proyecto->setTituloProyecto(          $_REQUEST["titulo_proyecto"]);
							$proyecto->setFechaInicioProyecto(     $_REQUEST["fecha_inicio_proyecto"]);
							$proyecto->setFKTipoProyecto(          $_REQUEST["codigo_tipo_proyecto"]);
							$proyecto->setDuracionProyecto(        $_REQUEST["cod_proyecto"]);
							$proyecto->setFKCodObjetoSocieconomico($_REQUEST["cod_objetivo"]);
							$proyecto->setObjetivoProyecto(        $_REQUEST["objetivo_proyecto"]);
							$proyecto->setResumenProyecto(         $_REQUEST["resumen_proyecto"]);
							$proyecto->setResultadosEsperados(     $_REQUEST["resultados_esperados"]);
							$proyecto->setValorProyecto(           $_REQUEST["valor_proyecto"]);
							
							
							if($proyecto->save()==false){
								foreach($proyecto->getMessages() as $message){ 
									Flash::error("ERROR AGREGANDO EN TABLA PROYECTO: ".$message); 
								}
								$transaction->rollback();
							}else{
								Flash::success("PROYECTO GUARDADO SATISFACTORIAMENTE");
							}
								
								
								//*** borrar TblFinanciacionNacionalProyecto
								$FinanciacionNacionalProyecto2 = new TblFinanciacionNacionalProyecto();
								$FinanciacionNacionalProyecto2->setTransaction($transaction);
								if(!$FinanciacionNacionalProyecto2->delete(" FK_Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
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
									
									$FinanciacionNacionalProyecto = new TblFinanciacionNacionalProyecto();
									$FinanciacionNacionalProyecto->setTransaction($transaction);
									$FinanciacionNacionalProyecto->setId('');
									$FinanciacionNacionalProyecto->setFKCodProyecto($proyecto->getCodProyecto());
									$FinanciacionNacionalProyecto->setFKCodFuenteFNacional($items->codigo);
				
									if($FinanciacionNacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FinanciacionNacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla FinanciacionNacionalProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}	
								
								
								//*** borrar TblFuenteFInternacionalProyecto
								$FuenteFInternacionalProyecto = new TblFuenteFInternacionalProyecto();
								$FuenteFInternacionalProyecto->setTransaction($transaction);
								if(!$FuenteFInternacionalProyecto->delete(" FK_Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
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
									
									//$FuenteFInternacionalProyecto = new TblFuenteFInternacionalProyecto();
									//$FuenteFInternacionalProyecto->setTransaction($transaction);
									$FuenteFInternacionalProyecto->setId('');
									$FuenteFInternacionalProyecto->setFKCodProyecto($proyecto->getCodProyecto());
									$FuenteFInternacionalProyecto->setFKCodFuenteFInternacional($items->codigo);
				
									if($FuenteFInternacionalProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
												Flash::error("Error Tabla FuenteFInternacionalProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
								
								
								
							
								
								//*** borrar TblGruposInvestigacionProyectos
								$GruposInvestigacionProyectos = new TblGruposInvestigacionProyectos();
								$GruposInvestigacionProyectos->setTransaction($transaction);
								if(!$GruposInvestigacionProyectos->delete(" Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
										foreach($GruposInvestigacionProyectos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblGruposInvestigacionProyectos : ".$message); 
										}
										$transaction->rollback();
									}	
								
								
								/*grupos_investigacion json*/
								$grupos_investigacion = $filter->apply($_POST["grupos_investigacion"], array("Striptags")); 
								$grupos_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$grupos_investigacion)));
								if($grupos_investigacion!='[]'){	
									if(json_decode($grupos_investigacion)){
										Flash::success("Json Correcto: grupos_investigacion");
										$grupos_investigacion = json_decode($grupos_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: grupos_investigacion");
										$transaction->rollback();
									}
								
								/* Agrega los grupos_investigacion */
								foreach( $grupos_investigacion as $items):
									
									//$GruposInvestigacionProyectos = new TblGruposInvestigacionProyectos();
									//$GruposInvestigacionProyectos->setTransaction($transaction);
									$GruposInvestigacionProyectos->setId('');
									$GruposInvestigacionProyectos->setCodProyecto($proyecto->getCodProyecto());
									$GruposInvestigacionProyectos->setCodGrupoInvestigacion($items->codigo);
				
									if($GruposInvestigacionProyectos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($GruposInvestigacionProyectos->getMessages() as $message){ 
												Flash::error("Error Tabla GruposInvestigacionProyectos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								}		
								/* Fin los grupos_investigacion */
								
								//*** borrar TblCentrosInvestigacionProyectos
								$CentrosInvestigacionProyectos = new TblCentrosInvestigacionProyectos();
								$CentrosInvestigacionProyectos->setTransaction($transaction);
								if(!$CentrosInvestigacionProyectos->delete(" Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
										foreach($CentrosInvestigacionProyectos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblCentrosInvestigacionProyectos : ".$message); 
										}
										$transaction->rollback();
									}	
								
								
								/*centros_investigacion json*/
								$centros_investigacion = $filter->apply($_POST["centros_investigacion"], array("Striptags")); 
								$centros_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$centros_investigacion)));
								if($centros_investigacion!='[]'){	
									if(json_decode($centros_investigacion)){
										Flash::success("Json Correcto: centros_investigacion");
										$centros_investigacion = json_decode($centros_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: centros_investigacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $centros_investigacion as $items):
									
									//$CentrosInvestigacionProyectos = new TblCentrosInvestigacionProyectos();
									//$CentrosInvestigacionProyectos->setTransaction($transaction);
									$CentrosInvestigacionProyectos->setId('');
									$CentrosInvestigacionProyectos->setCodProyecto($proyecto->getCodProyecto());
									$CentrosInvestigacionProyectos->setCodCentroInvestigacion($items->codigo);
				
									if($CentrosInvestigacionProyectos->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($CentrosInvestigacionProyectos->getMessages() as $message){ 
												Flash::error(" TABLA CentrosInvestigacionProyectos : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;
								}			
								/* Fin los centros_investigacion */
								
								//*** borrar TblRedCooperacionProyecto
								$RedCooperacionProyecto = new TblRedCooperacionProyecto();
								$RedCooperacionProyecto->setTransaction($transaction);
								if(!$RedCooperacionProyecto->delete(" Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
										foreach($RedCooperacionProyecto->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblRedCooperacionProyecto : ".$message); 
										}
										$transaction->rollback();
									}	
								
								/*redes_cooperacion json*/
								$redes_cooperacion = $filter->apply($_POST["redes_cooperacion"], array("Striptags")); 
								$redes_cooperacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$redes_cooperacion)));
								
								if($redes_cooperacion!='[]'){	
									if(json_decode($redes_cooperacion)){
										Flash::success("Json Correcto: redes_cooperacion");
										$redes_cooperacion = json_decode($redes_cooperacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: redes_cooperacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $redes_cooperacion as $items):
									
									//$RedCooperacionProyecto = new TblRedCooperacionProyecto();
									//$RedCooperacionProyecto->setTransaction($transaction);
									$RedCooperacionProyecto->setId('');
									$RedCooperacionProyecto->setCodProyecto($proyecto->getCodProyecto());
									$RedCooperacionProyecto->setCodRedCooperacion($items->codigo);
				
									if($RedCooperacionProyecto->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($RedCooperacionProyecto->getMessages() as $message){ 
												Flash::error(" TABLA RedCooperacionProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								
								}		
								/* Fin los redes_cooperacion */
								
								//*** borrar TblProyectoPorductoInvestigacion
								$ProyectoPorductoInvestigacion = new TblProyectoPorductoInvestigacion();
								$ProyectoPorductoInvestigacion->setTransaction($transaction);
								if(!$ProyectoPorductoInvestigacion->delete(" Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
										foreach($ProyectoPorductoInvestigacion->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblProyectoPorductoInvestigacion : ".$message); 
										}
										$transaction->rollback();
									}	
								/*productos_investigacion json*/
								$productos_investigacion = $filter->apply($_POST["productos_investigacion"], array("Striptags")); 
								$productos_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$productos_investigacion)));
								if($productos_investigacion!='[]'){	
									if(json_decode($productos_investigacion)){
										Flash::success("Json Correcto: productos_investigacion");
										$productos_investigacion = json_decode($productos_investigacion);
									}else{
										/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
										Flash::error("Error json: productos_investigacion ");
										$transaction->rollback();
									}
								
								/* Agrega los centros_investigacion */
								foreach( $productos_investigacion as $items):
									
									//$ProyectoPorductoInvestigacion = new TblProyectoPorductoInvestigacion();
									//$ProyectoPorductoInvestigacion->setTransaction($transaction);
									$ProyectoPorductoInvestigacion->setId('');
									$ProyectoPorductoInvestigacion->setCodProyecto($proyecto->getCodProyecto());
									$ProyectoPorductoInvestigacion->setCodProductoInvestigacion($items->codigo);
				
									if($ProyectoPorductoInvestigacion->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($ProyectoPorductoInvestigacion->getMessages() as $message){ 
												Flash::error(" TABLA ProyectoPorductoInvestigacion : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;		
								}	
								/* Fin los redes_cooperacion */
								
								//*** borrar TblGastos
								$Gastos = new TblGastos();
								$Gastos->setTransaction($transaction);
								if(!$Gastos->delete(" 1 = 1 and Cod_Proyecto = '".$proyecto->getCodProyecto()."' ")){
										foreach($Gastos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblGastos : ".$message); 
										}
										$transaction->rollback();
									}else{	
									
								
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
											
											//$Gastos = new TblGastos();
											//$Gastos->setTransaction($transaction);
											$Gastos->setCodGasto('0');
											$Gastos->setCodProyecto($proyecto->getCodProyecto());
											$Gastos->setValorGastos($items->valor);
											$Gastos->setFKCodTipoGastos($items->codigo);
						
											if($Gastos->save()==false){
													/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
													foreach($Gastos->getMessages() as $message){ 
														Flash::error("Error Tabla Gastos nuevos: ".$message); 
													}
													$transaction->rollback();
													
												}	
										endforeach;	
										}	
									}
								
							Flash::success("proyecto Modificado Satisfactoriamente");	
							$transaction->commit();
							echo "<script>quitar_mensajes();</script>";
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
						//print_r($e);
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
				$id = $id;
		
				$proyecto     = $this->TblProyecto->findFirst(" Cod_Proyecto = '$id' ");
				$ies          = $this->TblIes->findFirst(" Cod_IES = '".$proyecto->getFKCodIES()."' ");
				$tproyecto    = $this->TblTipoProyecto->findFirst(" Cod_Tipo_Proyecto = '".$proyecto->getFKTipoProyecto()."' ");
				$objetivo     = $this->TblObjetivoSocioeconomico->findFirst(" Cod_Objetivo_Socioeconomico = '".$proyecto->getFKCodObjetoSocieconomico()."' ");
				
				
				Tag::displayTo("cod_ies"               ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"            ,utf8_encode($ies->getNombreIES()));
				
				Tag::displayTo("cod_proyecto"          ,$proyecto->getCodProyecto());
				Tag::displayTo("titulo_proyecto"       ,utf8_encode($proyecto->getTituloProyecto()));
				Tag::displayTo("fecha_inicio_proyecto" ,$proyecto->getFechaInicioProyecto());
				Tag::displayTo("duracion_proyecto"     ,$proyecto->getDuracionProyecto());
				Tag::displayTo("fecha_inicio_proyecto" ,$proyecto->getFechaInicioProyecto());
				Tag::displayTo("duracion_proyecto"     ,$proyecto->getDuracionProyecto());
				Tag::displayTo("objetivo_proyecto"     ,utf8_encode($proyecto->getObjetivoProyecto()));
				Tag::displayTo("resumen_proyecto"      ,utf8_encode($proyecto->getResumenProyecto()));
				Tag::displayTo("resultados_esperados"  ,utf8_encode($proyecto->getResultadosEsperados()));
				Tag::displayTo("valor_proyecto"        ,$proyecto->getValorProyecto());
				
				Tag::displayTo("cod_objetivo"          ,$objetivo->getCodObjetivoSocioeconomico());
				Tag::displayTo("nombre_objetivo"       ,utf8_encode($objetivo->getDescripcionObjetivoSocioeconomico()));
				
				Tag::displayTo("codigo_tipo_proyecto"  ,$tproyecto->getCodTipoProyecto());
				Tag::displayTo("nombre_tipo_proyecto"  ,utf8_encode($tproyecto->getDescripcionTipoProyecto()));
				
				
				$this->setParamToView("fnacional"       ,$this->TblFinanciacionNacionalProyecto->find(" FK_Cod_Proyecto = '".$id."' "));
				$this->setParamToView("finternacional"  ,$this->TblFuenteFInternacionalProyecto->find(" FK_Cod_Proyecto = '".$id."' "));
				$this->setParamToView("gastos"          ,$this->TblGastos->find(" Cod_Proyecto = '".$id."'  "));
				$this->setParamToView("grupos"          ,$this->TblGruposInvestigacionProyectos->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("centros"         ,$this->TblCentrosInvestigacionProyectos->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("redes"           ,$this->TblRedCooperacionProyecto->find(" Cod_Proyecto = '".$id."' "));
				$this->setParamToView("productos"       ,$this->TblProyectoPorductoInvestigacion->find(" Cod_Proyecto = '".$id."' "));

				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			$id = $_REQUEST["cod_proyecto"];
			//Flash::error($id);
			$this->setResponse('view');
			
			$sw=0;
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
						
							//*** borrar TblFinanciacionNacionalProyecto
								$FinanciacionNacionalProyecto2 = new TblFinanciacionNacionalProyecto();
								$FinanciacionNacionalProyecto2->setTransaction($transaction);
								if(!$FinanciacionNacionalProyecto2->delete(" FK_Cod_Proyecto = '".$id."' ")){
										foreach($FinanciacionNacionalProyecto2->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblFinanciacionNacionalProyecto : ".$message); 
										}
										$transaction->rollback();
									}
							
								//*** borrar TblFuenteFInternacionalProyecto
								$FuenteFInternacionalProyecto = new TblFuenteFInternacionalProyecto();
								$FuenteFInternacionalProyecto->setTransaction($transaction);
								if(!$FuenteFInternacionalProyecto->delete(" FK_Cod_Proyecto = '".$id."' ")){
										foreach($FuenteFInternacionalProyecto->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblFuenteFInternacionalProyecto : ".$message); 
										}
										$transaction->rollback();
									}	
								
								//*** borrar TblGruposInvestigacionProyectos
								$GruposInvestigacionProyectos = new TblGruposInvestigacionProyectos();
								$GruposInvestigacionProyectos->setTransaction($transaction);
								if(!$GruposInvestigacionProyectos->delete(" Cod_Proyecto = '".$id."' ")){
										foreach($GruposInvestigacionProyectos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblGruposInvestigacionProyectos : ".$message); 
										}
										$transaction->rollback();
									}	
								
								//*** borrar TblCentrosInvestigacionProyectos
								$CentrosInvestigacionProyectos = new TblCentrosInvestigacionProyectos();
								$CentrosInvestigacionProyectos->setTransaction($transaction);
								if(!$CentrosInvestigacionProyectos->delete(" Cod_Proyecto = '".$id."' ")){
										foreach($CentrosInvestigacionProyectos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblCentrosInvestigacionProyectos : ".$message); 
										}
										$transaction->rollback();
									}	
							
								//*** borrar TblRedCooperacionProyecto
								$RedCooperacionProyecto = new TblRedCooperacionProyecto();
								$RedCooperacionProyecto->setTransaction($transaction);
								if(!$RedCooperacionProyecto->delete(" Cod_Proyecto = '".$id."' ")){
										foreach($RedCooperacionProyecto->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblRedCooperacionProyecto : ".$message); 
										}
										$transaction->rollback();
									}	
								
								//*** borrar TblProyectoPorductoInvestigacion
								$ProyectoPorductoInvestigacion = new TblProyectoPorductoInvestigacion();
								$ProyectoPorductoInvestigacion->setTransaction($transaction);
								if(!$ProyectoPorductoInvestigacion->delete(" Cod_Proyecto = '".$id."' ")){
										foreach($ProyectoPorductoInvestigacion->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblProyectoPorductoInvestigacion : ".$message); 
										}
										$transaction->rollback();
									}	
								
								
								//*** borrar TblGastos
								$Gastos = new TblGastos();
								$Gastos->setTransaction($transaction);
								if(!$Gastos->delete(" 1 = 1 and Cod_Proyecto = '".$id."' ")){
										foreach($Gastos->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla TblGastos : ".$message); 
										}
										$transaction->rollback();
									}
								
								//*** borrar TblFinanciacionNacionalProyecto
								$proyecto = new TblProyecto();
								$proyecto->setTransaction($transaction);
								if(!$proyecto->delete(" Cod_Proyecto = '".$id."' ")){
										foreach($proyecto->getMessages() as $message){ 
											Flash::error("Error Eliminado Tabla proyecto : ".$message); 
										}
										$transaction->rollback();
									}	
						
						
						$transaction->commit();
						Flash::success("proyecto Eliminado Satisfactoriamente");	
						echo "<script>quitar_mensajes();</script>";
					}catch(TransactionFailed $e){		
						Flash::error($e->getMessage());
						//print_r($e);
					//cierre cacth try
						
					}catch(DbContraintViolationException $e){
						Flash::error($e->getMessage());
						//Flash::error("NO SE PUEDE BORRAR PRODUCTO");
					}catch(DbException $e){
						//Flash::error($e->getMessage());
						Flash::error("NO SE PUEDE BORRAR ESTE REGISTRO: viola restriccion de llave foranea");	
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