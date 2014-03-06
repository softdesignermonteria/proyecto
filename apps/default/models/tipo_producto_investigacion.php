<?php
class TipoProductoInvestigacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $Descripcion_Tipo_Investigacion;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getId(){
		return $this->id;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setId($id){
		$this->id = $id;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionTipoInvestigacion(){
		return $this->Descripcion_Tipo_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionTipoInvestigacion($Descripcion_Tipo_Investigacion){
		$this->Descripcion_Tipo_Investigacion = $Descripcion_Tipo_Investigacion;
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