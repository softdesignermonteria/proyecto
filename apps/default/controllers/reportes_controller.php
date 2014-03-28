<?php

	class ReportesController extends ApplicationController {



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

				$this->setResponse('view');

				 Flash::error("No esta definida la accion $action, redireccionando");

				 return $this->redirect('administrador');

		}


		
		
		public function proyectoAction(){

		

		}	
		
		
		public function proyecto_detallesAction(){

			$this->setResponse('view');
			
			$condiciones = '';
			
			if($_REQUEST["cod_ies"]!=''               ){ $condiciones .= " and FK_Cod_IES                  = '".$_REQUEST["cod_ies"]."' "; }
			if($_REQUEST["codigo_tipo_proyecto"]!=''  ){ $condiciones .= " and FK_Tipo_Proyecto            = '".$_REQUEST["codigo_tipo_proyecto"]."' "; }
			if($_REQUEST["cod_objetivo"]!=''          ){ $condiciones .= " and FK_Cod_Objeto_Socieconomico = '".$_REQUEST["cod_objetivo"]."' "; }
			if($_REQUEST["fecha_inicio_proyecto"]!='' ){ $condiciones .= " and Fecha_Inicio_Proyecto ".$_REQUEST["signo_fecha"]." '".$_REQUEST["fecha_inicio_proyecto"]."' "; }
			
			
			$detalles = $this->TblProyecto->find(" 1 = 1 $condiciones ");
			
			$this->setParamToView("detalles",$detalles);

		}	
		
		
		public function excelAction(){

			$this->setResponse('view');

		}	

		
		public function centros_investigacionAction(){

		

		}

		
		public function excel_centros_investigacionAction(){

			$this->setResponse('view');

		}
		
		public function productos_investigacionAction(){

		

		}

		
		public function excel_productos_investigacionAction(){

			$this->setResponse('view');

		}
		
		
		public function redes_cooperacionAction(){


		}

		
		public function excel_redes_cooperacionAction(){

			$this->setResponse('view');

		}
		
		
		public function proyectos_investigacion_ingenieriasAction(){


		}

		
		public function excel_proyectos_investigacion_ingenieriasAction(){

			$this->setResponse('view');

		}
		
		
		public function otras_actividadesAction(){


		}

		
		public function excel_otras_actividadesAction(){

			$this->setResponse('view');

		}
		
		public function grupos_investigacion_ingenieriasAction(){


		}

		
		public function excel_grupos_investigacion_ingenieriasAction(){

			$this->setResponse('view');

		}
		
		
		public function investigadores_externos_iesAction(){


		}

		
		public function excel_investigadores_externos_iesAction(){

			$this->setResponse('view');

		}
		


		public function flujo_de_cajaAction(){


		}

		
		public function excel_flujo_de_cajaAction(){

			$this->setResponse('view');

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