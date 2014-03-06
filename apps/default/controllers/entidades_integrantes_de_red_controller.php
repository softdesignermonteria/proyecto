<?php

	class Entidades_integrantes_de_redController extends ApplicationController {



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
			$ent  = new TblEntidadesIntegrantesRed();
			//if($ent->count("id = '".$_REQUEST['codigo_entidades_integrantes_red']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_entidades_integrantes_red'];
			//if($id==''){$id=0;}	

			$ent->setId($id); 
			$ent->setNombreEntidadIntegranteRed($_REQUEST['nombre_entidades_integrantes_red']); 
			$ent->setFechaCreacionEntidadIntegranteRed($_REQUEST['fecha_creacion']); 
			$ent->setFechaRetiroEntidadesIntegrantesRed($_REQUEST['fecha_retiro']); 
			$ent->setFKCodSectorEntidad($_REQUEST['codigo_sector_entidad']); 
			$ent->setFKCodPais($_REQUEST['codigo_pais']); 
			
			if($sw==0){					
				if($ent->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($ent->getMessages() as $message){
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
				$codigo_entidades_integrantes_red = $id;
		
				$ent  = $this->TblEntidadesIntegrantesRed->findFirst(" id = '$codigo_entidades_integrantes_red' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$ent->getFKCodPais()."' ");
				$secent  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$ent->getFKCodSectorEntidad()."' ");
				
				Tag::displayTo("codigo_entidades_integrantes_red",$ent->getId());
				Tag::displayTo("nombre_entidades_integrantes_red",$ent->getNombreEntidadIntegranteRed());
				Tag::displayTo("fecha_creacion",$ent->getFechaCreacionEntidadIntegranteRed());
				Tag::displayTo("fecha_retiro",$ent->getFechaRetiroEntidadesIntegrantesRed());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				Tag::displayTo("codigo_sector_entidad",$secent->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$secent->getDescripcionSectorEntidad());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las ent
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$ent  = new TblEntidadesIntegrantesRed();
			//if($ent->count("id = '".$_REQUEST['codigo_entidades_integrantes_red']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_entidades_integrantes_red'];
			//if($id==''){$id=0;}	

			$ent->setId($id); 
			$ent->setNombreEntidadIntegranteRed($_REQUEST['nombre_entidades_integrantes_red']); 
			$ent->setFechaCreacionEntidadIntegranteRed($_REQUEST['fecha_creacion']); 
			$ent->setFechaRetiroEntidadesIntegrantesRed($_REQUEST['fecha_retiro']); 
			$ent->setFKCodSectorEntidad($_REQUEST['codigo_sector_entidad']); 
			$ent->setFKCodPais($_REQUEST['codigo_pais']); 
			
			if($sw==0){					
				if($ent->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($ent->getMessages() as $message){
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
				$codigo_entidades_integrantes_red = $id;
		
				$ent  = $this->TblEntidadesIntegrantesRed->findFirst(" id = '$codigo_entidades_integrantes_red' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$ent->getFKCodPais()."' ");
				$secent  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '".$ent->getFKCodSectorEntidad()."' ");
				
				Tag::displayTo("codigo_entidades_integrantes_red",$ent->getId());
				Tag::displayTo("nombre_entidades_integrantes_red",$ent->getNombreEntidadIntegranteRed());
				Tag::displayTo("fecha_creacion",$ent->getFechaCreacionEntidadIntegranteRed());
				Tag::displayTo("fecha_retiro",$ent->getFechaRetiroEntidadesIntegrantesRed());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				Tag::displayTo("codigo_sector_entidad",$secent->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$secent->getDescripcionSectorEntidad());				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$ent  = new TblEntidadesIntegrantesRed();
			
				
				if($ent->delete(" id = '".$_REQUEST["codigo_entidades_integrantes_red"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($ent->getMessages() as $message){
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