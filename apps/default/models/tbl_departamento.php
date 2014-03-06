<?php
class TblDepartamento extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Departamento;
	/**
	* @var string
	*/
	protected $Departamento;
	/**
	* @var integer
	*/
	protected $FK_Cod_Pais;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodDepartamento(){
		return $this->Cod_Departamento;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodDepartamento($CodDepartamento){
		$this->Cod_Departamento = $CodDepartamento;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDepartamento(){
		return $this->Departamento;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDepartamento($Departamento){
		$this->Departamento = $Departamento;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodPais(){
		return $this->FK_Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodPais($FKCodPais){
		$this->FK_Cod_Pais = $FKCodPais;
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