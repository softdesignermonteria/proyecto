<?php
class TblFuenteFinanciacionInternacional extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Fuente_Financiacion_Internacional;
	/**
	* @var string
	*/
	protected $Descripcion_Fuente_Financiacion_Internacional;
	
	/**
	* @var string
	*/
	protected $FK_Cod_Sector_Entidad;
	

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodFuenteFinanciacionInternacional(){
		return $this->Cod_Fuente_Financiacion_Internacional;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodFuenteFinanciacionInternacional($Cod_Fuente_Financiacion_Internacional){
		$this->Cod_Fuente_Financiacion_Internacional = $Cod_Fuente_Financiacion_Internacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionFuenteFinanciacionInternacional(){
		return $this->Descripcion_Fuente_Financiacion_Internacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionFuenteFinanciacionInternacional($Descripcion_Fuente_Financiacion_Internacional){
		$this->Descripcion_Fuente_Financiacion_Internacional = $Descripcion_Fuente_Financiacion_Internacional;
	}
	
	
	
	
	public function getFK_Cod_Sector_Entidad(){
		return $this->FK_Cod_Sector_Entidad;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFK_Cod_Sector_Entidad($FK_Cod_Sector_Entidad){
		$this->FK_Cod_Sector_Entidad = $FK_Cod_Sector_Entidad;
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