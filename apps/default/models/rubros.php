<?php

class Rubros extends ActiveRecord{
	
	protected $id;
	protected $rubro;

	public function initialize(){
       
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getRubro(){
		return $this->rubro;
	}
	
	public function setRubro($rubro){
		$this->rubro = $rubro;
	}
	

	/*public function before_save(){

            if($this->tipo_usuario == 0 ){
                Flash::error("Debe escoger un tipo de usuario");
                return 'cancel';
            }
      
    }*/

}

?>