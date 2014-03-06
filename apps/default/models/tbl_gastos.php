<?php
class TblGastos extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Gasto;
	/**
	* @var string
	*/
	protected $Cod_Proyecto;
	/**
	* @var string
	*/
	protected $Valor_Gastos;
	/**
	* @var string
	*/
	protected $FK_Cod_Tipo_Gastos;
	

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodGasto(){
		return $this->Cod_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodGasto($Cod_Gasto){
		$this->Cod_Gasto = $Cod_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getCod_Proyecto(){
		return $this->Cod_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCodProyecto($Cod_Proyecto){
		$this->Cod_Proyecto = $Cod_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getValorGastos(){
		return $this->Valor_Gastos;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setValorGastos($Valor_Gastos){
		$this->Valor_Gastos = $Valor_Gastos;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodTipoGastos(){
		return $this->FK_Cod_Tipo_Gastos;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodTipoGastos($FK_Cod_Tipo_Gastos){
		$this->FK_Cod_Tipo_Gastos = $FK_Cod_Tipo_Gastos;
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