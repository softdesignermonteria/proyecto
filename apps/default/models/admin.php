<?php

class Admin extends ActiveRecord{
	
	protected $id;
	protected $username;
	protected $password;
	protected $cedula;
	protected $nombre1;
	protected $nombre2;
	protected $apellido1;
	protected $apellido2;
	protected $nombre_completo;
	protected $role;

	public function initialize(){
       
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password; 
	}
	
	public function getCedula(){
		return $this->cedula;
	}
		
	public function setCedula($cedula){
		$this->cedula = $cedula;
	}
	
	
	public function getNombre1(){
		return $this->nombre1;
	}
	public function setNombre1($nombre1){
		$this->nombre1 = $nombre1;
	}
	
	public function getNombre2(){
		return $this->nombre2;
	}
	public function setNombre2($nombre2){
		$this->nombre2 = $nombre2;
	}
	
	public function getApellido1(){
		return $this->apellido1;
	}
	
	public function setApellido1($apellido1){
		$this->apellido1 = $apellido1;
	}
	
	public function getApellido2(){
		return $this->apellido2;
	}
	
	public function setApellido2($apellido2){
		$this->apellido2 = $apellido2;
	}

	public function getNombrecompleto(){
		return $this->nombre_completo;
	}
	
	public function setNombrecompleto($nombre_completo){
		$this->nombre_completo = $nombre_completo;
	}
	
	public function getRole(){
		return $this->role;
	}
	
	public function setRole($role){
		$this->role = $role;
	}
	
	
	/*public function before_save(){

            if($this->tipo_usuario == 0 ){
                Flash::error("Debe escoger un tipo de usuario");
                return 'cancel';
            }
      
    }*/

}

?>