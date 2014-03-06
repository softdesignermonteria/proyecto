<?php
class TblNivelEducativo extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $Descripcion;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo id
	* @param string $id
	*/
	
	public function getId(){
		return $this->id;
	}
	
	/**
	* Metodo para establecer el valor del campo id
	* @param string $id
	*/
	public function setId($id){
		$this->id = $id;
	}
	
	/**
	* Metodo para establecer el valor del campo Descripcion
	* @param string $Descripcion
	*/
	
	public function getDescripcion(){
		return $this->Descripcion;
	}
	
	/**
	* Metodo para establecer el valor del campo Descripcion
	* @param string $Descripcion
	*/

	public function setDescripcion($Descripcion){
		$this->Descripcion = $Descripcion;
	}

	/*
		public function before_save(){
				if($this->tipo_usuario == 0 ){
					Flash::error("Debe escoger un tipo de usuario");
					return 'cancel';
				}
		}
	*/

}

?>