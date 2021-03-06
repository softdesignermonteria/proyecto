<?php

	class Investigadores_externosController extends ApplicationController {



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
			$investigadores  = new TblInvestigadorExterno();
			if($investigadores->count("Identificacion_Externo = '".$_REQUEST['identificacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['identificacion'];
			//if($id==''){$id=0;}	

			$investigadores->setIdentificacion($id); 
			$investigadores->setPrimerNombre($_REQUEST['primer_nombre']); 
			$investigadores->setSegundoNombre($_REQUEST['segundo_nombre']); 
			$investigadores->setPrimerApellido($_REQUEST['primer_apellido']); 
			$investigadores->setSegundoApellido($_REQUEST['segundo_apellido']); 
			$investigadores->setTipoIdentificacion($_REQUEST['tipo_identificacion']); 
			$investigadores->setCorreo($_REQUEST['correo']); 
			$investigadores->setTelefono($_REQUEST['telefono']); 
			$investigadores->setFax($_REQUEST['fax']); 
			$investigadores->setFKCodIES($_REQUEST['cod_ies']); 
			$investigadores->setFKCodNBC($_REQUEST['codigo_nbc']); 
			$investigadores->seFKCodNivelEducativo($_REQUEST['codigo_nivel_educativo']); 
			$investigadores->setFKCodTipoParticipacionProyecto($_REQUEST['codigo_tipo_participacion_proyecto']); 
			$investigadores->setCodSectorEntidad($_REQUEST['codigo_sector_entidad']); 
			
			
			if($sw==0){					
				if($investigadores->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($investigadores->getMessages() as $message){
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
				$identificacion = $id;
		
				$investigadores  = $this->TblInvestigadorExterno->findFirst(" Identificacion_Externo = '$identificacion' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$investigadores->getFKCodIES()."' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$investigadores->getFKCodNBC()."' ");
				$neduc  = $this->TblNivelEducativo->findFirst(" id = '".$investigadores->getFKCodNivelEducativo()."' ");
				$tpp  = $this->TblTipoParticipacionProyecto->findFirst(" Cod_Tipo_Participacion_Proyecto = '".$investigadores->getFKCodTipoParticipacionProyecto()."' ");
				$sc  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$investigadores->getCodSectorEntidad()."' ");
				
				Tag::displayTo("identificacion"                 ,$investigadores->getIdentificacion());
				Tag::displayTo("primer_nombre"                  ,$investigadores->getPrimerNombre());
				Tag::displayTo("segundo_nombre"                 ,$investigadores->getSegundoNombre());
				Tag::displayTo("primer_apellido"                ,$investigadores->getPrimerApellido());
				Tag::displayTo("segundo_apellido"               ,$investigadores->getSegundoApellido());
				Tag::displayTo("correo"                         ,$investigadores->getCorreo());
				Tag::displayTo("telefono"                       ,$investigadores->getTelefono());
				Tag::displayTo("fax"             				,$investigadores->getFax());
				Tag::displayTo("tipo_identificacion"            ,$investigadores->getTipoIdentificacion());
				Tag::displayTo("cod_ies"                        ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"                     ,$ies->getNombreIES());
				Tag::displayTo("codigo_nbc"                     ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"                     ,$nbc->getDescripcionNBC());
				Tag::displayTo("codigo_nivel_educativo"         ,$neduc->getId());
				Tag::displayTo("nombre_nivel_educativo"          ,$neduc->getDescripcion());
				Tag::displayTo("codigo_tipo_participacion_proyecto",$tpp->getCodTipoParticipacionProyecto());
				Tag::displayTo("nombre_tipo_participacion_proyecto",$tpp->getDescripcionTipoParticipacionProyecto());
				Tag::displayTo("codigo_sector_entidad",$sc->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sc->getDescripcionSectorEntidad());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las investigadores
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$investigadores  = new TblInvestigadorExterno();
			//if($investigadores->count("Identificacion_Externo = '".$_REQUEST['identificacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$investigadores->setIdentificacion($_REQUEST['identificacion']); 
			$investigadores->setPrimerNombre($_REQUEST['primer_nombre']); 
			$investigadores->setSegundoNombre($_REQUEST['segundo_nombre']); 
			$investigadores->setPrimerApellido($_REQUEST['primer_apellido']); 
			$investigadores->setSegundoApellido($_REQUEST['segundo_apellido']); 
			$investigadores->setTipoIdentificacion($_REQUEST['tipo_identificacion']); 
			$investigadores->setCorreo($_REQUEST['correo']); 
			$investigadores->setTelefono($_REQUEST['telefono']); 
			$investigadores->setFax($_REQUEST['fax']); 
			$investigadores->setFKCodIES($_REQUEST['cod_ies']); 
			$investigadores->setFKCodNBC($_REQUEST['codigo_nbc']); 
			$investigadores->seFKCodNivelEducativo($_REQUEST['codigo_nivel_educativo']); 
			$investigadores->setFKCodTipoParticipacionProyecto($_REQUEST['codigo_tipo_participacion_proyecto']); 
			$investigadores->setCodSectorEntidad($_REQUEST['codigo_sector_entidad']);

			if($sw==0){					
				if($investigadores->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($investigadores->getMessages() as $message){
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
				$identificacion = $id;
		
				$investigadores  = $this->TblInvestigadorExterno->findFirst(" Identificacion_Externo = '$identificacion' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$investigadores->getFKCodIES()."' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$investigadores->getFKCodNBC()."' ");
				$neduc  = $this->TblNivelEducativo->findFirst(" id = '".$investigadores->getFKCodNivelEducativo()."' ");
				$tpp  = $this->TblTipoParticipacionProyecto->findFirst(" Cod_Tipo_Participacion_Proyecto = '".$investigadores->getFKCodTipoParticipacionProyecto()."' ");
				$sc  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$investigadores->getCodSectorEntidad()."' ");
				
				Tag::displayTo("identificacion"                 ,$investigadores->getIdentificacion());
				Tag::displayTo("primer_nombre"                  ,$investigadores->getPrimerNombre());
				Tag::displayTo("segundo_nombre"                 ,$investigadores->getSegundoNombre());
				Tag::displayTo("primer_apellido"                ,$investigadores->getPrimerApellido());
				Tag::displayTo("segundo_apellido"               ,$investigadores->getSegundoApellido());
				Tag::displayTo("correo"                         ,$investigadores->getCorreo());
				Tag::displayTo("telefono"                       ,$investigadores->getTelefono());
				Tag::displayTo("fax"             				,$investigadores->getFax());
				Tag::displayTo("tipo_identificacion"            ,$investigadores->getTipoIdentificacion());
				Tag::displayTo("cod_ies"                        ,$ies->getCodIES());
				Tag::displayTo("nombre_ies"                     ,$ies->getNombreIES());
				Tag::displayTo("codigo_nbc"                     ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"                     ,$nbc->getDescripcionNBC());
				Tag::displayTo("codigo_nivel_educativo"         ,$neduc->getId());
				Tag::displayTo("nombre_nivel_educativo"          ,$neduc->getDescripcion());
				Tag::displayTo("codigo_tipo_participacion_proyecto",$tpp->getCodTipoParticipacionProyecto());
				Tag::displayTo("nombre_tipo_participacion_proyecto",$tpp->getDescripcionTipoParticipacionProyecto());
				Tag::displayTo("codigo_sector_entidad",$sc->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sc->getDescripcionSectorEntidad());
			
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
				$investigadores  = new TblInvestigadorExterno();
				
					
					if($investigadores->delete(" Identificacion_Externo = '".$_REQUEST["identificacion"]."' ")){
						
						Flash::success(Router::getController()." Eliminada Satisfactoriamente");
						echo "<script>quitar_mensajes();</script>";
		
					}else{
					
						Flash::error("Error: No se pudo Eliminar .");	
						
						foreach($investigadores->getMessages() as $message){
								  Flash::error("Error Eliminando Ies ".$message->getMessage());
						}	  
						
					}
					
				}catch(DbContraintViolationException $e){
						Flash::error($e->getMessage());
						//Flash::error("NO SE PUEDE BORRAR PRODUCTO");
				}catch(DbException $e){
					//Flash::error($e->getMessage());
					Flash::error("NO SE PUEDE BORRAR ESTE REGISTRO: viola restriccion de llave foranea");	
				}
				/*}catch(TransactionFailed $e){		
					Flash::error($e->getMessage());
					//print_r($e);
				//cierre cacth try
				}	*/
					
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