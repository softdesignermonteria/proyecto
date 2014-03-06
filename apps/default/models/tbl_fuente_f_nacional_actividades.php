<?php
class TblFuenteFNacionalActividades extends ActiveRecord{
	
	/**
	* @var id
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $FK_Cod_Fuente_F_Nacional;
	/**
	* @var string
	*/
	protected $FK_Cod_Actividades_Investigacion;
	/**
	* @var string
	*/
	protected $valor;


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
	
	public function getFKCodFuenteFNacional(){
		return $this->FK_Cod_Fuente_F_Nacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodFuenteFNacional($FK_Cod_Fuente_F_Nacional){
		$this->FK_Cod_Fuente_F_Nacional = $FK_Cod_Fuente_F_Nacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodActividadesInvestigacion(){
		return $this->FK_Cod_Actividades_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodActividadesInvestigacion($FK_Cod_Actividades_Investigacion){
		$this->FK_Cod_Actividades_Investigacion = $FK_Cod_Actividades_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo valor
	* @param string $valor
	*/
	
	public function getValor(){
		return $this->valor;
	}
	
	/**
	* Metodo para establecer el valor del campo valor
	* @param string $valor
	*/

	public function setValor($valor){
		$this->valor = $valor;
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