<?php

class FlujoCaja extends ActiveRecord{
	
	protected $id;
	protected $Cod_Proyecto;
	protected $Identificacion;
	protected $facultad_responsable;
	

	public function initialize(){
       
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getCod_Proyecto(){
		return $this->Cod_Proyecto;
	}
	
	public function setCod_Proyecto($Cod_Proyecto){
		$this->Cod_Proyecto = $Cod_Proyecto;
	}
	
	
	public function getFacultadResponsable(){
		return $this->facultad_responsable;
	}
	
	public function setFacultadResponsable($facultad_responsable){
		$this->facultad_responsable = $facultad_responsable;
	}
	
	public function getIdentificacion(){
		return $this->Identificacion;
	}
	
	public function setIdentificacion($Identificacion){
		$this->Identificacion = $Identificacion; 
	}
	
	
	
	/*public function before_save(){

            if($this->tipo_usuario == 0 ){
                Flash::error("Debe escoger un tipo de usuario");
                return 'cancel';
            }
      
    }*/

}

?>