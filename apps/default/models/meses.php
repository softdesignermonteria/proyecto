<?php

class Meses extends ActiveRecord{
	
	protected $meses;
	protected $codigo;
	protected $mes;
	

	public function initialize(){
       
	}
	
	public function getMeses(){
		return $this->meses;
	}
	
	public function setMeses($meses){
		$this->meses = $meses;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	
	
	public function getMes(){
		return $this->mes;
	}
	
	public function setMes($mes){
		$this->mes = $mes; 
	}

	
	
	/*public function before_save(){

            if($this->tipo_usuario == 0 ){
                Flash::error("Debe escoger un tipo de usuario");
                return 'cancel';
            }
      
    }*/

}

?>