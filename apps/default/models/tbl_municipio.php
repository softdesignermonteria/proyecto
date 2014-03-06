<?php
class TblMunicipio extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Municipio;
	/**
	* @var string
	*/
	protected $Municipio;
	/**
	* @var string
	*/
	protected $FK_Cod_Departamento;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodMunicipio(){
		return $this->Cod_Municipio;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodMunicipio($Cod_Municipio){
		$this->Cod_Municipio = $Cod_Municipio;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getMunicipio(){
		return $this->Municipio;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setMunicipio($Municipio){
		$this->Municipio = $Municipio;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodDepartamento(){
		return $this->FK_Cod_Departamento;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodDepartamento($FK_Cod_Departamento){
		$this->FK_Cod_Departamento = $FK_Cod_Departamento;
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