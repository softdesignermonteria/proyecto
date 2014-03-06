<?php
class TblFuenteFInternacionalActividades extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $FK_Cod_Fuente_F_Internacional;
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
	
	public function getFKCodFuenteFInternacional(){
		return $this->FK_Cod_Fuente_F_Internacional;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodFuenteFInternacional($FK_Cod_Fuente_F_Internacional){
		$this->FK_Cod_Fuente_F_Internacional = $FK_Cod_Fuente_F_Internacional;
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