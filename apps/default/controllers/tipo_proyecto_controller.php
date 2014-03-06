<?php

	class Tipo_proyectoController extends ApplicationController {



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
			$tipo_proyecto  = new TblTipoProyecto();
			//if($tipo_proyecto->count("id = '".$_REQUEST['codigo_tipo_proyecto']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id=0; 
			if($_REQUEST['codigo_tipo_proyecto']!=''){ $id=$_REQUEST['codigo_tipo_proyecto']; }	
				$tipo_proyecto->setId($id); 
				$tipo_proyecto->setDescripcionTipoInvestigacion($_REQUEST['nombre_tipo_proyecto']); 
			if($sw==0){					
				if($tipo_proyecto->save()){
					Flash::success(Router::getController()."   Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
				}else{
					Flash::error("Error: No se pudo Guardar el registro...");	
					foreach($tipo_proyecto->getMessages() as $message){
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
				$codigo_tipo_proyecto = $id;
		
				$tipo_proyecto  = $this->TblTipoProyecto->findFirst(" id = '$codigo_tipo_proyecto' ");
				
				Tag::displayTo("codigo_tipo_proyecto",$tipo_proyecto->getId());
				Tag::displayTo("nombre_tipo_proyecto",$tipo_proyecto->getDescripcionTipoInvestigacion());
				
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
			$tipo_proyecto  = new TblTipoProyecto();
			//if($tipo_proyecto->count("id = '".$_REQUEST['codigo_tipo_proyecto']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$tipo_proyecto->setId($_REQUEST['codigo_tipo_proyecto']); 
			$tipo_proyecto->setDescripcionTipoInvestigacion($_REQUEST['nombre_tipo_proyecto']); 
			if($sw==0){					
				if($tipo_proyecto->save()){
					
					Flash::success(Router::getController()."   Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($tipo_proyecto->getMessages() as $message){
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
				$codigo_tipo_proyecto = $id;
		
				$tipo_proyecto  = $this->TblTipoProyecto->findFirst(" id = '$codigo_tipo_proyecto' ");
				
				Tag::displayTo("codigo_tipo_proyecto",$tipo_proyecto->getId());
				Tag::displayTo("nombre_tipo_proyecto",$tipo_proyecto->getDescripcionTipoInvestigacion());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar Ies para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$tipo_proyecto  = new TblTipoProyecto();
			
				
				if($tipo_proyecto->delete(" id = '".$_REQUEST["codigo_tipo_proyecto"]."' ")){
					
					Flash::success(Router::getController()."   Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($tipo_proyecto->getMessages() as $message){
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
		



	}



?>