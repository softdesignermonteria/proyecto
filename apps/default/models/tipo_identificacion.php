<?php

class TipoIdentificacion extends ActiveRecord{
	
	
	protected $tipo_identificacion;
	protected $descripcion;
	
	
	public function getTipoIdentificacion(){
		return $this->tipo_identificacion;
	}
	
	public function setTipoIdentificacion($tipo_identificacion){
		$this->id = $tipo_identificacion;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
}

?>