<?php
class TblCentrosInvestigacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Centro_Investigacion;
	/**
	* @var string
	*/
	protected $Nombre_Centro_Investigacion;
	/**
	* @var integer
	*/
	protected $FK_Cod_IES;
	/**
	* @var integer
	*/
	protected $FK_Cod_Municipio;
	/**
	* @var date
	*/
	protected $Fecha_Creacion_Centro_Investigacion;
	/**
	* @var date
	*/
	protected $Fecha_Adicion_Grupo;
	/**
	* @var date
	*/
	protected $Fecha_Retiro_Grupo;
	

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodCentroInvestigacion
	* @param string $CodCentroInvestigacion
	*/
	
	public function getCodCentroInvestigacion(){
		return $this->Cod_Centro_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodCentroInvestigacion
	* @param string $CodCentroInvestigacion
	*/
	public function setCodCentroInvestigacion($CodCentroInvestigacion){
		$this->Cod_Centro_Investigacion = $CodCentroInvestigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo NombreCentroInvestigacion
	* @param string $NombreCentroInvestigacion
	*/
	
	public function getNombreCentroInvestigacion(){
		return $this->Nombre_Centro_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo NombreCentroInvestigacion
	* @param string $NombreCentroInvestigacion
	*/
	public function setNombreCentroInvestigacion($NombreCentroInvestigacion){
		$this->Nombre_Centro_Investigacion = $NombreCentroInvestigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo FKCodIES
	* @param string $FKCodIES
	*/
	
	public function getFKCodIES(){
		return $this->FK_Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo FKCodIES
	* @param string $FKCodIES
	*/

	public function setFKCodIES($FKCodIES){
		$this->FK_Cod_IES = $FKCodIES;
	}
	
	
	/**
	* Metodo para establecer el valor del campo FKCodMunicipio
	* @param string $FKCodMunicipio
	*/
	
	public function getFKCodMunicipio(){
		return $this->FK_Cod_Municipio;
	}
	
	/**
	* Metodo para establecer el valor del campo FKCodMunicipio
	* @param string $FKCodMunicipio
	*/
	public function setFKCodMunicipio($FKCodMunicipio){
		$this->FK_Cod_Municipio = $FKCodMunicipio;
	}
	
	
	/**
	* Metodo para establecer el valor del campo FKCodIES
	* @param string $FKCodIES
	*/
	
	public function getFechaCreacionCentroInvestigacion(){
		return $this->Fecha_Creacion_Centro_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo FKCodIES
	* @param string $FKCodIES
	*/

	public function setFechaCreacionCentroInvestigacion($FechaCreacionCentroInvestigacion){
		$this->Fecha_Creacion_Centro_Investigacion = $FechaCreacionCentroInvestigacion;
	}
	
	
	
	
	/**
	* Metodo para establecer el valor del campo FechaAdicionGrupo
	* @param string $FechaAdicionGrupo
	*/
	
	public function getFechaAdicionGrupo(){
		return $this->Fecha_Adicion_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo FechaAdicionGrupo
	* @param string $FechaAdicionGrupo
	*/

	public function setFechaAdicionGrupo($FechaAdicionGrupo){
		$this->Fecha_Adicion_Grupo = $FechaAdicionGrupo;
	}
	
	
	/**
	* Metodo para establecer el valor del campo FechaAdicionGrupo
	* @param string $FechaAdicionGrupo
	*/
	
	public function getFechaRetiroGrupo(){
		return $this->Fecha_Retiro_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo FechaAdicionGrupo
	* @param string $FechaAdicionGrupo
	*/

	public function setFechaRetiroGrupo($FechaRetiroGrupo){
		$this->Fecha_Retiro_Grupo = $FechaRetiroGrupo;
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