<?php

	class Productos_de_investigacionController extends ApplicationController {



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
			$producto  = new TblProductoInvestigacion();
			//if($producto->count("Cod_Producto_Investigacion = '".$_REQUEST['cod_producto_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['cod_producto_investigacion'];
			if($id==''){$id=0;}	
			$producto->setCodProductoInvestigacion($id); 
			$producto->setDescripcionProductoInvestigacion($_REQUEST['nombre_producto_investigacion']); 
			$producto->setAnoObtecion($_REQUEST['ano_obtencion']); 
			$producto->setMesObtencion($_REQUEST['mes_obtencion']); 
			$producto->setFKTipoProducto($_REQUEST['codigo_tipo_productos_de_investigacion']); 
			$producto->setFKNBC($_REQUEST['codigo_nbc']); 
			if($sw==0){					
				if($producto->save()){
					
					Flash::success(Router::getController()."  Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");
						
					
					foreach($producto->getMessages() as $message){
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
				$cod_producto_investigacion = $id;
		
				$producto  = $this->TblProductoInvestigacion->findFirst(" Cod_Producto_Investigacion = '$cod_producto_investigacion' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$producto->getFKNBC()."' ");
				$tipoproducto  = $this->TipoProductoInvestigacion->findFirst(" id = '".$producto->getFKTipoProducto()."' ");
				
				Tag::displayTo("cod_producto_investigacion"    ,$producto->getCodProductoInvestigacion());
				Tag::displayTo("nombre_producto_investigacion" ,$producto->getDescripcionProductoInvestigacion());
				Tag::displayTo("ano_obtencion"     ,$producto->getAnoObtecion());
				Tag::displayTo("mes_obtencion"     ,$producto->getMesObtencion());
				Tag::displayTo("codigo_tipo_productos_de_investigacion",$tipoproducto->getId());
				Tag::displayTo("nombre_tipo_productos_de_investigacion",$tipoproducto->getDescripcionTipoInvestigacion());
				Tag::displayTo("codigo_nbc"        ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"        ,$nbc->getDescripcionNBC());
				
						
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las producto
		*/
		
		public function updateAction(){
			$this->setResponse('view');
			$producto  = new TblProductoInvestigacion();
			//if($producto->count("Cod_Producto_Investigacion = '".$_REQUEST['cod_producto_investigacion']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$producto->setCodProductoInvestigacion($_REQUEST['cod_producto_investigacion']); 
			$producto->setDescripcionProductoInvestigacion($_REQUEST['nombre_producto_investigacion']); 
			$producto->setAnoObtecion($_REQUEST['ano_obtencion']); 
			$producto->setMesObtencion($_REQUEST['mes_obtencion']); 
			$producto->setFKTipoProducto($_REQUEST['codigo_tipo_productos_de_investigacion']); 
			$producto->setFKNBC($_REQUEST['codigo_nbc']); 
			
			if($sw==0){					
				if($producto->save()){
					
					Flash::success(Router::getController()."  Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($producto->getMessages() as $message){
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
				$cod_producto_investigacion = $id;
		
				$producto  = $this->TblProductoInvestigacion->findFirst(" Cod_Producto_Investigacion = '$cod_producto_investigacion' ");
				$nbc  = $this->TblNbc->findFirst(" Cod_NBC = '".$producto->getFKNBC()."' ");
				$tipoproducto  = $this->TipoProductoInvestigacion->findFirst(" id = '".$producto->getFKTipoProducto()."' ");
				
				Tag::displayTo("cod_producto_investigacion"    ,$producto->getCodProductoInvestigacion());
				Tag::displayTo("nombre_producto_investigacion" ,$producto->getDescripcionProductoInvestigacion());
				Tag::displayTo("ano_obtencion"     ,$producto->getAnoObtecion());
				Tag::displayTo("mes_obtencion"     ,$producto->getMesObtencion());
				Tag::displayTo("codigo_tipo_productos_de_investigacion",$tipoproducto->getId());
				Tag::displayTo("nombre_tipo_productos_de_investigacion",$tipoproducto->getDescripcionTipoInvestigacion());
				Tag::displayTo("codigo_nbc"        ,$nbc->getCodNBC());
				Tag::displayTo("nombre_nbc"        ,$nbc->getDescripcionNBC());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			
			
			$transaction = new ActiveRecordTransaction(true);
					try{
						$transaction = TransactionManager::getUserTransaction(); 
						$producto  = new TblProductoInvestigacion();
						$producto->setTransaction($transaction);
							if($producto->delete(" Cod_Producto_Investigacion = '".$_REQUEST["cod_producto_investigacion"]."' ")){
								Flash::success(Router::getController()."  Eliminada Satisfactoriamente");
								echo "<script>quitar_mensajes();</script>";
				
							}else{
								Flash::error("Error: No se pudo Eliminar .");
								$transaction->rollback();	
								foreach($producto->getMessages() as $message){
										  Flash::error("Error Eliminando ".Router::getController()." ".$message->getMessage());
								}	  
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