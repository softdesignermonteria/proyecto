<?php
class TblFuenteFinanciacionNacional extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Fuente_Financiacion_Nacional;
	/**
	* @var string
	*/
	protected $Descripcion_Fuente_Financiacion_Nacional;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodFuenteFinanciacionNacional(){
		return $this->Cod_Fuente_Financiacion_Nacional;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodFuenteFinanciacionNacional($Cod_Fuente_Financiacion_Nacional){
		$this->Cod_Fuente_Financiacion_Nacional = $Cod_Fuente_Financiacion_Nacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionFuenteFinanciacionNacional(){
		return $this->Descripcion_Fuente_Financiacion_Nacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionFuenteFinanciacionNacional($Descripcion_Fuente_Financiacion_Nacional){
		$this->Descripcion_Fuente_Financiacion_Nacional = $Descripcion_Fuente_Financiacion_Nacional;
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