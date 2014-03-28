<?php

	class AdministradorController extends ApplicationController {
	
		
		
		
		public function initialize() {
		
		
			$this->setTemplateAfter("adminiziolite");
	
		}


		/**
		 * Aqui sale el formulario de Iniciar Sesión
		 *
		 */
		 
		public function indexAction(){
		
		}
		
		
		 public function not_found($controller, $action){
				 $this->set_response('view');
				 Flash::error("No esta definida la accion $action, redireccionando");
				 return $this->redirect('menu');
				 
		 }

		/**
		 * Esta accion es ejecutada por application/before_filter en caso
		 * de que el usuario trate de entrar a una accion a la cual
		 * no tiene permiso
		 *
		 */
		public function no_accesoAction(){

		}
		
		
		
		public function cambioAction(){

		}
		
		
		
		
		public function permisosAction(){
			
			//verficando permisos
			$acl  = new AccessList();
			
			$role = new Role();
			//Flash::success("Verificando Permisos");
			
			
			foreach($role->find(" role != 'administrador' ") as $role):
				Flash::success("verificando Permisos del Perfil '".$role->getRole()."");
				
				if($acl->count(" role = '".$role->getRole()."' and resource = 'administrador' and action = '*' ") == 0 ){
						$acl->setId('');
						$acl->setRole($role->getRole());
						$acl->setResource("administrador");
						$acl->setAction("*");
						$acl->setAllow('N');
						//Flash::notice(count($tmp).$menu->url);
						if( !$acl->save() ){
							Flash::error("Error Guardando Registro");
							foreach($acl->getMessages() as $message){ 
								Flash::error("Error tabla access list : ".$message); 
							}
						}
				}
				
				$menu = new Menu();
				foreach($menu->find("posicion_y <> 0") as $menu):
						//Flash::success("verificando Permisos del Perfil '".$role->getRole()."");
					$tmp = explode("/",$menu->getUrl());
					$resource = $tmp[0]; 
					$action   = $tmp[1]; 
					if($action==''){ $action = 'index'; }
					//Flash::notice(count($tmp));
					if($acl->count(" role = '".$role->getRole()."' and resource = '$resource' and action = '$action' ") == 0 ){
						$acl->setId('');
						$acl->setRole($role->getRole());
						$acl->setResource($resource);
						$acl->setAction($action);
						$acl->setAllow('Y');
						//Flash::notice(count($tmp).$menu->url);
						if( !$acl->save() ){
							Flash::error("Error Guardando Registro");
							foreach($acl->getMessages() as $message){ 
								Flash::error("Error tabla access list : ".$message); 
							}
						}
						
						if($acl->count("role = '".$role->getRole()."' and  resource = '$resource' and action = 'agregar' ") == 0 ){
							$acl->setId('');
							$acl->setRole($role->getRole());
							$acl->setResource($resource);
							$acl->setAction("agregar");
							$acl->setAllow('N');
							//Flash::notice(count($tmp).$menu->url);
							if( !$acl->save() ){
								Flash::error("Error Guardando Registro");
								foreach($acl->getMessages() as $message){ 
									Flash::error("Error tabla access list : ".$message); 
								}
							}
						}
						if($acl->count("role = '".$role->getRole()."' and  resource = '$resource' and action = 'buscar' ") == 0 ){
							$acl->setId('');
							$acl->setRole($role->getRole());
							$acl->setResource($resource);
							$acl->setAction("buscar");
							$acl->setAllow('N');
							//Flash::notice(count($tmp).$menu->url);
							if( !$acl->save() ){
								Flash::error("Error Guardando Registro");
								foreach($acl->getMessages() as $message){ 
									Flash::error("Error tabla access list : ".$message); 
								}
							}
						}
						if($acl->count("role = '".$role->getRole()."' and  resource = '$resource' and action = 'eliminar' ") == 0 ){
							$acl->setId('');
							$acl->setRole($role->getRole());
							$acl->setResource($resource);
							$acl->setAction("eliminar");
							$acl->setAllow('N');
							//Flash::notice(count($tmp).$menu->url);
							if( !$acl->save() ){
								Flash::error("Error Guardando Registro");
								foreach($acl->getMessages() as $message){ 
									Flash::error("Error tabla access list : ".$message); 
								}
							}
						}
						if($acl->count("role = '".$role->getRole()."' and  resource = '$resource' and action = 'modificar' ") == 0 ){
							$acl->setId('');
							$acl->setRole($role->getRole());
							$acl->setResource($resource);
							$acl->setAction("modificar");
							$acl->setAllow('N');
							//Flash::notice(count($tmp).$menu->url);
							if( !$acl->save() ){
								Flash::error("Error Guardando Registro");
								foreach($acl->getMessages() as $message){ 
									Flash::error("Error tabla access list : ".$message); 
								}
							}
						}
						
					}
				endforeach;
				
			endforeach; //roles
			
			Flash::success("Permisos Actualizados");
			
			echo "<script>quitar_mensajes();</script>";
			
				
				
		}
		
		
		public function ver_permisosAction(){
			$this->setResponse("ajax");
			
			if( isset($_REQUEST["role"])==true && isset($_REQUEST["controlador"])==true && isset($_REQUEST["accion"])==true && isset($_REQUEST["permiso"])==true ){
				$role = $_REQUEST["role"];
				$controlador = $_REQUEST["controlador"];
				$accion = $_REQUEST["accion"];
				$permiso = $_REQUEST["permiso"];
				$acl = new AccessList();
				if($permiso=='Y'){ $permiso = 'N'; }else{ $permiso = 'Y'; }
				$acl = $this->AccessList->findFirst(" role = '$role' and resource = '$controlador' and  action = '$accion' ");
				$acl->allow = $permiso;
				
				if(!$acl->save()){
					Flash::Error("Error Actualizando el permiso");
				}
				
			}
			echo "<script>quitar_mensajes();</script>";
		}
		
		
		public function AgregarAction(){

		}
		
			
		public function modificarAction($id){
			$user =  $this->Admin->findFirst("id = '".$id."'");
			Tag::displayTo("id",$user->getId());
			Tag::displayTo("username",$user->getUsername());
			Tag::displayTo("cedula",$user->getCedula());
			Tag::displayTo("nombre1",$user->getNombre1());
			Tag::displayTo("nombre2",$user->getNombre2());
			Tag::displayTo("apellido1",$user->getApellido1());
			Tag::displayTo("apellido2",$user->getApellido2());
			if(Session::get("role")=="administrador" ) {
						Tag::displayTo("role",$user->getRole());
					}
		}
		
		
		public function eliminarAction($id){
			$user =  $this->Admin->findFirst("id = '".$id."'");
			Tag::displayTo("id",$user->getId());
			Tag::displayTo("username",$user->getUsername());
			Tag::displayTo("cedula",$user->getCedula());
			Tag::displayTo("nombre1",$user->getNombre1());
			Tag::displayTo("nombre2",$user->getNombre2());
			Tag::displayTo("apellido1",$user->getApellido1());
			Tag::displayTo("apellido2",$user->getApellido2());
			if(Session::get("role")=="administrador" ) {
						Tag::displayTo("role",$user->getRole());
					}
		}
		
		public function updateAction(){
			
			$this->setResponse("ajax");
			$Usuario= new Admin();
			$sw=0;
			//$usuario = $Usuario->findFirst("username = '".$_REQUEST['username']."'");
			
			if($sw==1){
				Flash::error("Error: Nombre usuario ya existe!!!");
			
			}else{
				
				if($this->getPostParam("password")=="" || $this->getPostParam("confirmar") =="" ){$sw=1;Flash::error("Contrasenas Requeridas..");}
				if($this->getPostParam("password")!=$this->getPostParam("confirmar")){$sw=1;Flash::error("Error Contrasenas no son iguales..");}
			
				if($sw==0){
						$Usuario = $this->Admin->findFirst(" id = '".$_REQUEST["id"]."' ");
						//$Usuario->setId($this->getPostParam("id"));
						$Usuario->setUsername($this->getPostParam("username"));
						
						$Usuario->setCedula($this->getPostParam("cedula"));
						$Usuario->setNombre1($this->getPostParam("nombre1"));
						$Usuario->setNombre2($this->getPostParam("nombre2"));
						$Usuario->setApellido1($this->getPostParam("apellido1"));
						$Usuario->setApellido2($this->getPostParam("apellido2"));
					
						//$Usuario->setNombrecompleto("");
						
						if($this->getPostParam("password")!=''){
							$Usuario->setPassword(md5($this->getPostParam("password")));
						}
						
						$Usuario->setNombrecompleto($this->getPostParam("nombre_completo"));
						if(Session::get("role")=="superadministrador" ) {
								$Usuario->role  = $this->getPostParam("role");
						}
					
						if($Usuario->save()){
							  Flash::success("Se Actualizo correctamente el registro");
							  /*echo "<script>redireccionar_action('menu');</script>";	*/
							  echo "<script>quitar_mensajes();</script>";
							  
						}else{
							 Flash::success("Error: No se pudo Actualizar el registro");	
							 /*echo "<script>redireccionar_action('menu');</script>";	*/
							 
							 foreach($Usuario->getMessages() as $message){ 
								Flash::error("Error tabla Usuarios : ".$message); 
							}
						}
				
				}
			}
			
		}
		
		
		public function deleteAction(){
			
			$this->setResponse('view');
			
			$adm  = new Admin();
			
				
				if($adm->delete(" id = '".$_REQUEST["id"]."' ")){
					
					Flash::success(Router::getController()." Eliminada Satisfactoriamente");
					echo "<script>quitar_mensajes();</script>";
	
				}else{
				
					Flash::error("Error: No se pudo Eliminar .");	
					
					foreach($adm->getMessages() as $message){
							  Flash::error("Error Eliminando Ies ".$message->getMessage());
					}	  
					
				}
				
		}
		
		public function buscarAction(){
			
		}
		
		
		
		public function find_buscarAction(){
			
		}
		
		
		public function find_detalle_buscarAction(){
			$this->setResponse("ajax");
		}
		
		
		
		public function addAction(){
			$this->setResponse("ajax");
			$Usuario= new Admin();
			$sw=0;
			
				
				if($this->getPostParam("password")!=$this->getPostParam("confirmar")){$sw=1;Flash::error("Error Contraseñas no son iguales..");}
			
					if($sw==0){
						
						$Usuario->setId($this->getPostParam("id"));
						$Usuario->setUsername($this->getPostParam("username"));
						$Usuario->setPassword(md5($this->getPostParam("password")));
						$Usuario->setCedula($this->getPostParam("cedula"));
						$Usuario->setNombre1($this->getPostParam("nombre1"));
						$Usuario->setNombre2($this->getPostParam("nombre2"));
						$Usuario->setApellido1($this->getPostParam("apellido1"));
						$Usuario->setApellido2($this->getPostParam("apellido2"));
						$Usuario->setNombrecompleto("");
						$Usuario->setRole($this->getPostParam("role"));
						
									if($Usuario->save()){
											Flash::success("Usuario creado correctamente el registro");
											echo "<script>quitar_mensajes();</script>";
									}else{
										 foreach($Usuario->getMessages() as $message){ 
											Flash::error("Error tabla Usuarios : ".$message); 
										}
										Flash::error("NO SE INSERTO EL REGISTRO");
									}
					}
			
					
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