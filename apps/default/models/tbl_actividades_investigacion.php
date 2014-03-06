<?php
class TblActividadesInvestigacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Actividades_Investigacion;
	/**
	* @var string
	*/
	protected $Descripcion_Actividades_Investigacion;
	/**
	* @var string
	*/
	protected $Cod_IES;
	/**
	* @var string
	*/
	protected $annos;
	/**
	* @var string
	*/
	protected $semestre;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $Cod_Actividades_Investigacion
	*/
	
	public function getCodActividadesInvestigacion(){
		return $this->Cod_Actividades_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $Cod_Actividades_Investigacion
	*/
	public function setCodActividadesInvestigacion($CodActividadesInvestigacion){
		$this->Cod_Actividades_Investigacion = $CodActividadesInvestigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/
	
	public function getDescripcionActividadesInvestigacion(){
		return $this->Descripcion_Actividades_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/

	public function setDescripcionActividadesInvestigacion($DescripcionActividadesInvestigacion){
		$this->Descripcion_Actividades_Investigacion = $DescripcionActividadesInvestigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/
	
	public function getCodIES(){
		return $this->Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/

	public function setCodIES($CodIES){
		$this->Cod_IES = $CodIES;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/
	
	public function getAnnos(){
		return $this->annos;
	}
	
	/**
	* Metodo para establecer el valor del campo annos
	* @param string $annos
	*/

	public function setAnnos($annos){
		$this->annos = $annos;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/
	
	public function getSemestre(){
		return $this->semestre;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $Descripcion_Actividades_Investigacion
	*/

	public function setSemestre($semestre){
		$this->semestre = $semestre;
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