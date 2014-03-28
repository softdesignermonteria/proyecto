<?php

	class Centros_de_investigacionController extends ApplicationController {



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
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
							//$proyecto = new TblProyecto();
							//$proyecto->setTransaction($transaction);
							$filter = new Filter();
							$centro_investigacion  = new TblCentrosInvestigacion();
							$centro_investigacion->setTransaction($transaction);
							//if($centro_investigacion->count("Cod_Centro_Investigacion = '".$_REQUEST['codigo_centro_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
							$centro_investigacion->setCodCentroInvestigacion('0'); 
							$centro_investigacion->setNombreCentroInvestigacion($_REQUEST['nombre_centros_investigacion']); 
							$centro_investigacion->setFKCodIES($_REQUEST['cod_ies']); 
							$centro_investigacion->setFKCodMunicipio($_REQUEST['codigo_municipios']); 
							$centro_investigacion->setFechaCreacionCentroInvestigacion($_REQUEST['fecha_creacion']); 
							$centro_investigacion->setFechaAdicionGrupo($_REQUEST['fecha_adicion_grupo']); 
							$centro_investigacion->setFechaRetiroGrupo($_REQUEST['fecha_retiro_grupo']); 
				
						
							if($centro_investigacion->save()==false){
								foreach($centro_investigacion->getMessages() as $message){ 
											Flash::error(" TABLA centro_investigacion : ".$message); 
										}
								$transaction->rollback();									
							}
							
							/*grupos_centros_investigacion json*/
							$grupos_centros_investigacion = $filter->apply($_POST["grupos_centros_investigacion"], array("Striptags")); 
							$grupos_centros_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$grupos_centros_investigacion)));
							
							if($grupos_centros_investigacion!='[]'){	
								if(json_decode($grupos_centros_investigacion)){
									Flash::success("Json Correcto: grupos_centros_investigacion");
									$grupos_centros_investigacion = json_decode($grupos_centros_investigacion);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: grupos_centros_investigacion ");
									$transaction->rollback();
								}
									
								/* Agrega los centros_investigacion */
								foreach( $grupos_centros_investigacion as $items):
									
									$GruposInvCentrosInv = new TblGruposInvCentrosInv();
									$GruposInvCentrosInv->setTransaction($transaction);
									$GruposInvCentrosInv->setId('');
									$GruposInvCentrosInv->setCodGrupoInv($items->codigo);
									$GruposInvCentrosInv->setCodCentroInv($centro_investigacion->getCodCentroInvestigacion());
				
									if($GruposInvCentrosInv->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($GruposInvCentrosInv->getMessages() as $message){ 
												Flash::error(" TABLA RedCooperacionProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								
								}		
								/* Fin los grupos_centros_investigacion */
								
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
				$codigo_centro_investigacion = $id;
		
				$centro_investigacion   = $this->TblCentrosInvestigacion->findFirst(" Cod_Centro_Investigacion = '$codigo_centro_investigacion' ");
				$mun   = $this->TblMunicipio->findFirst(" Cod_Municipio = '".$centro_investigacion->getFKCodMunicipio()."' ");
				$cod_ies  = $this->TblIes->findFirst(" Cod_IES = '".$centro_investigacion->getFKCodIES()."' ");
				$dpto  = $this->TblDepartamento->findFirst(" Cod_Departamento = '".$mun->getFKCodDepartamento()."' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$dpto->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_centros_investigacion",$centro_investigacion->getCodCentroInvestigacion());
				Tag::displayTo("nombre_centros_investigacion",$centro_investigacion->getNombreCentroInvestigacion());
				Tag::displayTo("cod_ies"                     ,$cod_ies->getCodIES());
				Tag::displayTo("nombre_ies"                  ,$cod_ies->getNombreIES());
				
				//Tag::displayTo("nombre_pais"                 ,$pais->getNombrePais());
				//Tag::displayTo("codigo_departamentos"        ,$dpto->getCodDepartamento());
				//Tag::displayTo("nombre_departamentos"        ,$dpto->getDepartamento());
				Tag::displayTo("codigo_municipios"           ,$mun->getCodMunicipio());
				Tag::displayTo("nombre_municipios"           ,$mun->getMunicipio());
				Tag::displayTo("fecha_creacion"              ,$centro_investigacion->getFechaCreacionCentroInvestigacion());
				Tag::displayTo("fecha_adicion_grupo"         ,$centro_investigacion->getFechaAdicionGrupo());
				Tag::displayTo("fecha_retiro_grupo"          ,$centro_investigacion->getFechaRetiroGrupo());
				Tag::displayTo("codigo_pais"                 ,$pais->getCodPais());
				
				$this->setParamToView("grupos"          ,$this->TblGruposInvCentrosInv->find(" Cod_Centro_Inv = '".$id."' "));

				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las centro_investigacion
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
							
							//$proyecto = new TblProyecto();
							//$proyecto->setTransaction($transaction);
							$filter = new Filter();
							$centro_investigacion  = new TblCentrosInvestigacion();
							$centro_investigacion->setTransaction($transaction);
							//if($centro_investigacion->count("Cod_Centro_Investigacion = '".$_REQUEST['codigo_centro_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
							$centro_investigacion->setCodCentroInvestigacion($_REQUEST['codigo_centros_investigacion']); 
							$centro_investigacion->setNombreCentroInvestigacion($_REQUEST['nombre_centros_investigacion']); 
							$centro_investigacion->setFKCodIES($_REQUEST['cod_ies']); 
							$centro_investigacion->setFKCodMunicipio($_REQUEST['codigo_municipios']); 
							$centro_investigacion->setFechaCreacionCentroInvestigacion($_REQUEST['fecha_creacion']); 
							$centro_investigacion->setFechaAdicionGrupo($_REQUEST['fecha_adicion_grupo']); 
							$centro_investigacion->setFechaRetiroGrupo($_REQUEST['fecha_retiro_grupo']); 
				
						
							if($centro_investigacion->save()==false){
								foreach($centro_investigacion->getMessages() as $message){ 
											Flash::error(" TABLA centro_investigacion : ".$message); 
										}
								$transaction->rollback();									
							}
							
							
							//*** borrar TblGruposInvestigacionProyectos
							$grupos_centros_investigacion = new TblGruposInvCentrosInv();
							$grupos_centros_investigacion->setTransaction($transaction);
							if(!$grupos_centros_investigacion->delete(" Cod_Centro_Inv = '".$centro_investigacion->getCodCentroInvestigacion()."' ")){
									foreach($grupos_centros_investigacion->getMessages() as $message){ 
										Flash::error("Error Eliminado Tabla TblGruposInvCentrosInv : ".$message); 
									}
									$transaction->rollback();
								}	
							
							
							/*grupos_centros_investigacion json*/
							$grupos_centros_investigacion = $filter->apply($_POST["grupos_centros_investigacion"], array("Striptags")); 
							$grupos_centros_investigacion = str_replace("]\"","]",str_replace("\"[","[",str_replace("\\","",$grupos_centros_investigacion)));
							
							if($grupos_centros_investigacion!='[]'){	
								if(json_decode($grupos_centros_investigacion)){
									Flash::success("Json Correcto: grupos_centros_investigacion");
									$grupos_centros_investigacion = json_decode($grupos_centros_investigacion);
								}else{
									/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
									Flash::error("Error json: grupos_centros_investigacion ");
									$transaction->rollback();
								}
									
								/* Agrega los centros_investigacion */
								foreach( $grupos_centros_investigacion as $items):
									
									$GruposInvCentrosInv = new TblGruposInvCentrosInv();
									$GruposInvCentrosInv->setTransaction($transaction);
									$GruposInvCentrosInv->setId('');
									$GruposInvCentrosInv->setCodGrupoInv($items->codigo);
									$GruposInvCentrosInv->setCodCentroInv($centro_investigacion->getCodCentroInvestigacion());
				
									if($GruposInvCentrosInv->save()==false){
											/*echo "<script>jQuery(\"#guardar\").removeAttr(\"disabled\");</script>";*/
											foreach($GruposInvCentrosInv->getMessages() as $message){ 
												Flash::error(" TABLA RedCooperacionProyecto : ".$message); 
											}
											$transaction->rollback();
											
										}	
								endforeach;	
								
								}		
								/* Fin los grupos_centros_investigacion */
								
							Flash::success("proyecto Modificado Satisfactoriamente");	
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
				$codigo_centro_investigacion = $id;
		
				$centro_investigacion   = $this->TblCentrosInvestigacion->findFirst(" Cod_Centro_Investigacion = '$codigo_centro_investigacion' ");
				$mun   = $this->TblMunicipio->findFirst(" Cod_Municipio = '".$centro_investigacion->getFKCodMunicipio()."' ");
				$cod_ies  = $this->TblIes->findFirst(" Cod_IES = '".$centro_investigacion->getFKCodIES()."' ");
				$dpto  = $this->TblDepartamento->findFirst(" Cod_Departamento = '".$mun->getFKCodDepartamento()."' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$dpto->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_centros_investigacion",$centro_investigacion->getCodCentroInvestigacion());
				Tag::displayTo("nombre_centros_investigacion",$centro_investigacion->getNombreCentroInvestigacion());
				Tag::displayTo("cod_ies"                     ,$cod_ies->getCodIES());
				Tag::displayTo("nombre_ies"                  ,$cod_ies->getNombreIES());
				
				//Tag::displayTo("nombre_pais"                 ,$pais->getNombrePais());
				//Tag::displayTo("codigo_departamentos"        ,$dpto->getCodDepartamento());
				//Tag::displayTo("nombre_departamentos"        ,$dpto->getDepartamento());
				Tag::displayTo("codigo_municipios"           ,$mun->getCodMunicipio());
				Tag::displayTo("nombre_municipios"           ,$mun->getMunicipio());
				Tag::displayTo("fecha_creacion"              ,$centro_investigacion->getFechaCreacionCentroInvestigacion());
				Tag::displayTo("fecha_adicion_grupo"         ,$centro_investigacion->getFechaAdicionGrupo());
				Tag::displayTo("fecha_retiro_grupo"          ,$centro_investigacion->getFechaRetiroGrupo());
				Tag::displayTo("codigo_pais"                 ,$pais->getCodPais());
				
				$this->setParamToView("grupos"          ,$this->TblGruposInvCentrosInv->find(" Cod_Centro_Inv = '".$id."' "));
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			$this->setResponse('view');
			
			$sw=0;
			
			   
			if($sw==0){
				$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
						
						   //*** borrar TblGruposInvestigacionProyectos
							$centro_investigacion = new TblGruposInvCentrosInv();
							$centro_investigacion->setTransaction($transaction);
							if(!$centro_investigacion->delete(" Cod_Centro_Inv = '".$id."' ")){
									foreach($centro_investigacion->getMessages() as $message){ 
										Flash::error("Error Eliminado Tabla TblGruposInvCentrosInv : ".$message); 
									}
									$transaction->rollback();
								}	
							
						
							//*** borrar TblGruposInvestigacionProyectos
							$centro_investigacion = new TblCentrosInvestigacion();
							$centro_investigacion->setTransaction($transaction);
							if(!$centro_investigacion->delete(" Cod_Centro_Investigacion = '".$id."' ")){
									foreach($centro_investigacion->getMessages() as $message){ 
										Flash::error("Error Eliminado Tabla TblCentrosInvestigacion : ".$message); 
									}
									$transaction->rollback();
								}	
							
							
								
							Flash::success("proyecto Eliminado Satisfactoriamente");	
							$transaction->commit();
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