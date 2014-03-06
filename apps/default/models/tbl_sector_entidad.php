<?php
class TblSectorEntidad extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Sector_Entidad;
	/**
	* @var string
	*/
	protected $FK_Cod_IES;
	
	/**
	* @var string
	*/
	protected $FK_Cod_Pais;
	
	/**
	* @var string
	*/
	protected $Descripcion_Sector_Entidad;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodSectorEntidad(){
		return $this->Cod_Sector_Entidad;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodSectorEntidad($Cod_Sector_Entidad){
		$this->Cod_Sector_Entidad = $Cod_Sector_Entidad;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodIES(){
		return $this->FK_Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodIES($FK_Cod_IES){
		$this->FK_Cod_IES = $FK_Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getFKCodPais(){
		return $this->FK_Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setFKCodPais($FK_Cod_Pais){
		$this->FK_Cod_Pais = $FK_Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionSectorEntidad(){
		return $this->Descripcion_Sector_Entidad;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionSectorEntidad($Descripcion_Sector_Entidad){
		$this->Descripcion_Sector_Entidad = $Descripcion_Sector_Entidad;
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