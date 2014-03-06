<?php
class TblPais extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Pais;
	/**
	* @var string
	*/
	protected $Nombre_Pais;
	
	

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodPais(){
		return $this->Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodPais($Cod_Pais){
		$this->Cod_Pais = $Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getNombrePais(){
		return $this->Nombre_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setNombrePais($Nombre_Pais){
		$this->Nombre_Pais = $Nombre_Pais;
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