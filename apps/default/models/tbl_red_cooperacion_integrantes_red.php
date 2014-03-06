<?php
class TblRedCooperacionIntegrantesRed extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $FK_Cod_Red_Cooperacion;
	/**
	* @var integer
	*/
	protected $FK_Id_Entidades_Integrantes_Red;
	/**
	* @var string
	*/
	protected $Fecha_Adicion;
	/**
	* @var string
	*/
	protected $Fecha_Retiro;
	
	

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
	
	public function getFKCodRedCooperacion(){
		return $this->FK_Cod_Red_Cooperacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodRedCooperacion($FK_Cod_Red_Cooperacion){
		$this->FK_Cod_Red_Cooperacion = $FK_Cod_Red_Cooperacion;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getFKIdEntidadesIntegrantesRed(){
		return $this->FK_Id_Entidades_Integrantes_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setFKIdEntidadesIntegrantesRed($FK_Id_Entidades_Integrantes_Red){
		$this->FK_Id_Entidades_Integrantes_Red = $FK_Id_Entidades_Integrantes_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaAdicion(){
		return $this->Fecha_Adicion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaAdicion($Fecha_Adicion){
		$this->Fecha_Adicion = $Fecha_Adicion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaRetiro(){
		return $this->Fecha_Retiro;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaRetiro($Fecha_Retiro){
		$this->Fecha_Retiro = $Fecha_Retiro;
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