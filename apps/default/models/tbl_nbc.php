<?php
class TblNbc extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_NBC;
	/**
	* @var string
	*/
	protected $Descripcion_NBC;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodNBC(){
		return $this->Cod_NBC;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodNBC($Cod_NBC){
		$this->Cod_NBC = $Cod_NBC;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionNBC(){
		return $this->Descripcion_NBC;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionNBC($Descripcion_NBC){
		$this->Descripcion_NBC = $Descripcion_NBC;
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