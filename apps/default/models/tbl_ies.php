<?php
class TblIes extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_IES;
	/**
	* @var string
	*/
	protected $Nombre_IES;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodIES(){
		return $this->Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodIES($Cod_IES){
		$this->Cod_IES = $Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getNombreIES(){
		return $this->Nombre_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setNombreIES($Nombre_IES){
		$this->Nombre_IES = $Nombre_IES;
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