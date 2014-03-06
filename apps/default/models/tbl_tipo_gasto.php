<?php
class TblTipoGasto extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Tipo_Gasto;
	/**
	* @var string
	*/
	protected $Descripcion_Tipo_Gasto;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodTipoGasto(){
		return $this->Cod_Tipo_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodTipoGasto($Cod_Tipo_Gasto){
		$this->Cod_Tipo_Gasto = $Cod_Tipo_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionTipoGasto(){
		return $this->Descripcion_Tipo_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionTipoGasto($Descripcion_Tipo_Gasto){
		$this->Descripcion_Tipo_Gasto = $Descripcion_Tipo_Gasto;
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