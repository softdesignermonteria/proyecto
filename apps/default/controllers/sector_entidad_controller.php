<?php

	class Sector_entidadController extends ApplicationController {



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
			$sectorent  = new TblSectorEntidad();
			//if($sectorent->count("Cod_Sector_Entidad = '".$_REQUEST['codigo_sector_entidad']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
			$id = $_REQUEST['codigo_sector_entidad'];
			if($id==''){$id=0;}	

			$sectorent->setCodSectorEntidad($id); 
			$sectorent->setFKCodPais($_REQUEST['codigo_pais']); 
			$sectorent->setFKCodIES($_REQUEST['cod_ies']); 
			$sectorent->setDescripcionSectorEntidad($_REQUEST['nombre_sector_entidad']); 
			
			if($sw==0){					
				if($sectorent->save()){
					
					Flash::success(Router::getController()." Guardada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($sectorent->getMessages() as $message){
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
				$codigo_sector_entidad = $id;
		
				$sectorent  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '$codigo_sector_entidad' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$sectorent->getFKCodPais()."' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$sectorent->getFKCodIES()."' ");
				
				Tag::displayTo("codigo_sector_entidad",$sectorent->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sectorent->getDescripcionSectorEntidad());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				Tag::displayTo("cod_ies",$ies->getCodIES());
				Tag::displayTo("nombre_ies",$ies->getNombreIES());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		/*
		* modifica datos de las sectorent
		*/
		
		public function updateAction(){
			
			$this->setResponse('view');
			$sw=0;
			$sectorent  = new TblSectorEntidad();
			//if($sectorent->count("Cod_Sector_Entidad = '".$_REQUEST['codigo_sector_entidad']."' ")>0){ $sw=1; Flash::error("Codigo ya Existe.."); }
				
			$sectorent->setCodSectorEntidad($_REQUEST['codigo_sector_entidad']); 
			$sectorent->setFKCodPais($_REQUEST['codigo_pais']); 
			$sectorent->setFKCodIES($_REQUEST['cod_ies']); 
			$sectorent->setDescripcionSectorEntidad($_REQUEST['nombre_sector_entidad']); 
			if($sw==0){					
				if($sectorent->save()){
					
					Flash::success(Router::getController()." Modificado Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Guardar el registro...");	
					
					foreach($sectorent->getMessages() as $message){
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
				$codigo_sector_entidad = $id;
		
				$sectorent  = $this->TblSectorEntidad->findFirst(" Cod_Sector_Entidad = '$codigo_sector_entidad' ");
				$pais  = $this->TblPais->findFirst(" Cod_Pais = '".$sectorent->getFKCodPais()."' ");
				$ies  = $this->TblIes->findFirst(" Cod_IES = '".$sectorent->getFKCodIES()."' ");
				
				Tag::displayTo("codigo_sector_entidad",$sectorent->getCodSectorEntidad());
				Tag::displayTo("nombre_sector_entidad",$sectorent->getDescripcionSectorEntidad());
				Tag::displayTo("codigo_pais",$pais->getCodPais());
				Tag::displayTo("nombre_pais",$pais->getNombrePais());
				Tag::displayTo("cod_ies",$ies->getCodIES());
				Tag::displayTo("nombre_ies",$ies->getNombreIES());
				
			}else{
					Flash::error("Parametro Incorrecto Volver a Buscar ".Router::getController()." para modificar.");
				}
		}
		
		public function deleteAction(){
			
			
			
			$this->setResponse('view');
			try{
			$sectorent  = new TblSectorEntidad();
			
				
				if($sectorent->delete(" Cod_Sector_Entidad = '".$_REQUEST["codigo_sector_entidad"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($sectorent->getMessages() as $message){
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