<?php

	class MunicipiosController extends ApplicationController {



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
			$Municipio  = new TblMunicipio();
			if($Municipio->count("Cod_Municipio = '".$_REQUEST['codigo_municipios']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			
			if($sw==0){	
				$id = $_REQUEST['codigo_municipios']; 
				if($id==''){ $id=0; }
				$Municipio->setCodMunicipio($id); 
				$Municipio->setMunicipio($_REQUEST['nombre_municipio']); 
				$Municipio->setFKCodDepartamento($_REQUEST['codigo_departamento']); 
				if($Municipio->save()){
					Flash::success(strtoupper(Router::getController())." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
				}else{
					Flash::error("Error: No se pudo Guardar el registro...");	
					foreach($Municipio->getMessages() as $message){
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
				$codigo_municipios = $id;
		
				$Municipio  = $this->TblMunicipio->findFirst(" Cod_Municipio = '$codigo_municipios' ");
				$dpto       = $this->TblDepartamento->findFirst(" Cod_Departamento = '".$Municipio->getFKCodDepartamento()."' ");
				$pais       = $this->TblPais->findFirst(" Cod_Pais = '".$dpto->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_municipios",$Municipio->getCodMunicipio());
				Tag::displayTo("nombre_municipios",$Municipio->getMunicipio());
				Tag::displayTo("codigo_departamento",$dpto->getCodDepartamento());
				Tag::displayTo("nombre_departamento",$dpto->getDepartamento());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		/*
		* modifica datos de las Municipio
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$Municipio  = new TblMunicipio();
			//if($Municipio->count("Cod_Municipio = '".$_REQUEST['codigo_municipios']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$Municipio->setCodMunicipio($_REQUEST['codigo_municipios']); 
			$Municipio->setMunicipio($_REQUEST['nombre_municipios']); 
			$Municipio->setFKCodDepartamento($_REQUEST['codigo_departamento']); 
			if($sw==0){					
				if($Municipio->save()){
					
					Flash::success(strtoupper(Router::getController())." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($Municipio->getMessages() as $message){
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
				$codigo_municipios = $id;
		
				$Municipio  = $this->TblMunicipio->findFirst(" Cod_Municipio = '$codigo_municipios' ");
				$dpto       = $this->TblDepartamento->findFirst(" Cod_Departamento = '".$Municipio->getFKCodDepartamento()."' ");
				$pais       = $this->TblPais->findFirst(" Cod_Pais = '".$dpto->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_municipios",$Municipio->getCodMunicipio());
				Tag::displayTo("nombre_municipios",$Municipio->getMunicipio());
				Tag::displayTo("codigo_departamento",$dpto->getCodDepartamento());
				Tag::displayTo("nombre_departamento",$dpto->getDepartamento());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".strtoupper(Router::getController())." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$Municipio  = new TblMunicipio();
			
				
				if($Municipio->delete(" Cod_Municipio = '".$_REQUEST["codigo_municipios"]."' ")){
					
					Flash::success(strtoupper(Router::getController())." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($Municipio->getMessages() as $message){
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



	}



?>