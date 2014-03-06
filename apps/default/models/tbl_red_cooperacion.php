<?php
class TblRedCooperacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Red_Cooperacion;
	/**
	* @var string
	*/
	protected $Nombre_Red_Cooperacion;
	
	/**
	* @var integer
	*/
	protected $FK_Cod_IES;
	/**
	* @var string
	*/
	protected $FK_Cod_NBC;
	/**
	* @var string
	*/
	protected $Fecha_Creacion_Red_Cooperacion;
	

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodRedCooperacion(){
		return $this->Cod_Red_Cooperacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodRedCooperacion($Cod_Red_Cooperacion){
		$this->Cod_Red_Cooperacion = $Cod_Red_Cooperacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getNombreRedCooperacion(){
		return $this->Nombre_Red_Cooperacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setNombreRedCooperacion($Nombre_Red_Cooperacion){
		$this->Nombre_Red_Cooperacion = $Nombre_Red_Cooperacion;
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

	public function setFKCodIES($Nombre_Red_Cooperacion){
		$this->FK_Cod_IES = $Nombre_Red_Cooperacion;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodNBC(){
		return $this->FK_Cod_NBC;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodNBC($FK_Cod_NBC){
		$this->FK_Cod_NBC = $FK_Cod_NBC;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaCreacionRedCooperacion(){
		return $this->Fecha_Creacion_Red_Cooperacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaCreacionRedCooperacion($Fecha_Creacion_Red_Cooperacion){
		$this->Fecha_Creacion_Red_Cooperacion = $Fecha_Creacion_Red_Cooperacion;
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