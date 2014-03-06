<?php

class Role extends ActiveRecord{
	
	
	protected $id;
	protected $role;
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getRole(){
		return $this->role;
	}
	
	public function setRole($role){
		$this->role = $role;
	}
	
}

?>