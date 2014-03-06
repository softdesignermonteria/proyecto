<?php

class FlujoCajaDetalles extends ActiveRecord{
	
	protected $id;
	protected $rubro_id;
	protected $flujo_caja_id;
	protected $valor;
	protected $meses;
	protected $annos;
	protected $descripcion_gastos;
	

	public function initialize(){
       
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getRubro_id(){
		return $this->rubro_id;
	}
	
	public function setRubro_id($rubro_id){
		$this->rubro_id = $rubro_id;
	}
	
	public function getFlujo_caja_id(){
		return $this->flujo_caja_id;
	}
	
	public function setFlujo_caja_id($flujo_caja_id){
		$this->flujo_caja_id = $flujo_caja_id;
	}
	
	
	public function getValor(){
		return $this->valor;
	}
	
	public function setValor($valor){
		$this->valor = $valor; 
	}
	
	public function getAnnos(){
		return $this->annos;
	}
	
	public function setAnnos($annos){
		$this->annos = $annos; 
	}
	
	public function getMeses(){
		return $this->meses;
	}
	public function setMeses($meses){
		$this->meses = $meses;
	}
	
	public function getDescripcion_gastos(){
		return $this->descripcion_gastos;
	}
	public function setDescripcion_gastos($descripcion_gastos){
		$this->descripcion_gastos = $descripcion_gastos;
	}
	
	
	
	/*public function before_save(){

            if($this->tipo_usuario == 0 ){
                Flash::error("Debe escoger un tipo de usuario");
                return 'cancel';
            }
      
    }*/

}

?>