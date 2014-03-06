<?php
class TblGastosActividades extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $FK_Cod_Tipo_Gasto;
	/**
	* @var string
	*/
	protected $Fk_Cod_Actividades_Investigacion;
	/**
	* @var string
	*/
	protected $valor;
	

	public function initialize(){
       
	}
	
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/
	
	public function getId(){
		return $this->id;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/

	public function setId($id){
		$this->id = $id;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $Cod_Actividades_Investigacion
	*/
	
	public function getFKCodTipoGasto(){
		return $this->FK_Cod_Tipo_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $Cod_Actividades_Investigacion
	*/
	public function setFKCodTipoGasto($FK_Cod_Tipo_Gasto){
		$this->FK_Cod_Tipo_Gasto = $FK_Cod_Tipo_Gasto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/
	
	public function getFkCodActividadesInvestigacion(){
		return $this->Fk_Cod_Actividades_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/

	public function setFkCodActividadesInvestigacion($Fk_Cod_Actividades_Investigacion){
		$this->Fk_Cod_Actividades_Investigacion = $Fk_Cod_Actividades_Investigacion;
	}
	
	
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/
	
	public function getValor(){
		return $this->valor;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/

	public function setValor($valor){
		$this->valor = $valor;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/
	
	

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