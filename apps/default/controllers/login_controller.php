<?php

	class LoginController extends ApplicationController {



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

		 

		public function LoginAction(){

		

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

			

		/**

		 * Validacion si el login y el password son correctos

		 */

		public function validaAction(){

				$Usuario = new Admin();

				$usuario = $Usuario->findFirst(" username = '".$_REQUEST['login']."' and password = '".md5($_REQUEST['password'])."'");

				if($usuario){

					/**

					 * Almaceno en la variable de session el id del usuario

					 * autenticado

					 */

					Session::set('admin_username'      , $usuario->getUsername());

					Session::set('usuarios_id'         , $usuario->getId());

					Session::set('nombre_completo'     , $usuario->getNombrecompleto());

					Session::set('usuario_autenticado' , true);

					Session::set('role'                , $usuario->getRole());

					/**

					 * Lo redireccionos al formulario de clientes

					 */
						Flash::error('Logueado');
						//$this->setResponse("ajax");
						echo "<script>redireccionar_action('home/aplicaciones');</script>";

				} else {

					Flash::error('Usuario/Clave incorrectos');

					return $this->routeTo('action: login');

				}



		}

		/*

		* Salir Sale del sistema y cierra todas las variables 

		* de las sessiones activas para este hilo de conexion

		*/

		

		public function salirAction(){

			

				Session::unsetData('admin_username');

				Session::unsetData('role');

				Session::unsetData('usuarios_id');

				Session::unsetData('nombre_completo');

				Session::unsetData('usuario_autenticado');

		

			Flash::notice('Has salido Gracias');

			return $this->routeTo('action: login');

		}

		

		

		public function addAction(){

			$this->setResponse("ajax");

			$Usuario= new Admin();

			$sw=0;

			$usuario = $Usuario->findFirst("username = '".$_REQUEST['username']."'");

			

			if($usuario){

				Flash::error("Error: Nombre usuario ya existe!!!");

			}else{

				

				if($this->getPostParam("password")!=$this->getPostParam("confirmar")){$sw=1;Flash::error("Error Contraseñas no son iguales..");}

			

				if($sw==0){

					$Usuario->id               = $this->getPostParam("id");;

					$Usuario->username         = $this->getPostParam("username");

					$Usuario->password         = $this->getPostParam("password");

					$Usuario->nombre_completo  = $this->getPostParam("nombre_completo");

					$Usuario->tipo_usuario     = $this->getPostParam("tipo_usuario");

					$Usuario->empleado_id     = $this->getPostParam("empleado_id");

					$Usuario->role             = $this->getPostParam("role");

					

					if($Usuario->save()){

						    Flash::addMessage("Se CREO correctamente el registro",FLASH::SUCCESS);
							

						  /*echo "<script>redireccionar_action('menu');</script>";	*/

						   return $this->redirect('menu');

					}else{

							

						 foreach($Usuario->getMessages() as $message){ 

							Flash::error("Error tabla Usuarios : ".$message); 

						}

						Flash::addMessage("NO SE INSERTO EL REGISTRO",FLASH::ERROR);

						  /*echo "<script>redireccionar_action('menu');</script>";	*/

						   return $this->redirect('menu');

					}

				

				}

			}

					

		}

		

		public function showAction($id){

          

            $admin = $this->Admin->find("id='$id'");

            $this->setParamToView("admin", $admin);

	

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