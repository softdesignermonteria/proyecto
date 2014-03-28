<?php

	class DepartamentosController extends ApplicationController {



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
			$ies  = new TblDepartamento();
			if($ies->count("Cod_Departamento = '".$_REQUEST['codigo_departamento']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			
			if($sw==0){	
				$id = $_REQUEST['codigo_departamento']; 
				if($id==''){ $id=0; }
				$ies->setCodDepartamento($id); 
				$ies->setDepartamento($_REQUEST['nombre_departamento']); 
				$ies->setFKCodPais($_REQUEST['codigo_pais']); 
				
				if($ies->save()){
					Flash::success(strtoupper(Router::getController())." Guardada Satisfactoriamente");
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
				$codigo_departamento = $id;
		
				$ies  = $this->TblDepartamento->findFirst(" Cod_Departamento = '$codigo_departamento' ");
				$pais = $this->TblPais->findFirst(" Cod_Pais = '".$ies->getFKCodPais()."' ");
				Tag::displayTo("codigo_departamento",$ies->getCodDepartamento());
				Tag::displayTo("nombre_departamento",$ies->getDepartamento());
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
			$ies  = new TblDepartamento();
			//if($ies->count("Cod_Departamento = '".$_REQUEST['codigo_departamento']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$ies->setCodDepartamento($_REQUEST['codigo_departamento']); 
			$ies->setDepartamento($_REQUEST['nombre_departamento']); 
			$ies->setFKCodPais($_REQUEST['codigo_pais']); 
			if($sw==0){					
				if($ies->save()){
					
					Flash::success(strtoupper(Router::getController())." Modificado Satisfactoriamente");
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
			
				$codigo_departamento = $id;
		
				$dpto  = $this->TblDepartamento->findFirst(" Cod_Departamento = '$codigo_departamento' ");
				$pais = $this->TblPais->findFirst(" Cod_Pais = '".$dpto->getFKCodPais()."' ");
				
				Tag::displayTo("codigo_departamento",$dpto->getCodDepartamento());
				Tag::displayTo("nombre_departamento",$dpto->getDepartamento());
				Tag::displayTo("codigo_pais",$dpto->getFKCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".strtoupper(Router::getController())." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$ies  = new TblDepartamento();
			
				
				if($ies->delete(" Cod_Departamento = '".$_REQUEST["codigo_departamento"]."' ")){
					
					Flash::success(strtoupper(Router::getController())." Eliminada Satisfactoriamente");
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