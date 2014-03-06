<?php
class TblGrupoInvestigacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Grupo;
	/**
	* @var string
	*/
	protected $Nombre_Grupo;
	/**
	* @var string
	*/
	protected $Fecha_Creacion_Grupo_I;
	/**
	* @var string
	*/
	protected $Fecha_Vigencia_Grupo_I;
	/**
	* @var string
	*/
	protected $FK_Cod_NBC;
	/**
	* @var string
	*/
	protected $FK_Cod_IES;


	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodGrupo(){
		return $this->Cod_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodGrupo($Cod_Grupo){
		$this->Cod_Grupo = $Cod_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getNombreGrupo(){
		return $this->Nombre_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setNombreGrupo($Nombre_Grupo){
		$this->Nombre_Grupo = $Nombre_Grupo;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaCreacionGrupoI(){
		return $this->Fecha_Creacion_Grupo_I;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaCreacionGrupoI($Fecha_Creacion_Grupo_I){
		$this->Fecha_Creacion_Grupo_I = $Fecha_Creacion_Grupo_I;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaVigenciaGrupoI(){
		return $this->Fecha_Vigencia_Grupo_I;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaVigenciaGrupoI($Fecha_Vigencia_Grupo_I){
		$this->Fecha_Vigencia_Grupo_I = $Fecha_Vigencia_Grupo_I;
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
	
	public function getFKCodIES(){
		return $this->FK_Cod_IES;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodIES($FK_Cod_IES){
		$this->FK_Cod_IES = $FK_Cod_IES;
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