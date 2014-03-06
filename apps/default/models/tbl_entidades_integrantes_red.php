<?php
class TblEntidadesIntegrantesRed extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $Nombre_Entidad_IntegranteRed;
	/**
	* @var string
	*/
	protected $Fecha_Creacion_Entidad_Integrante_Red;
	/**
	* @var string
	*/
	protected $Fecha_Retiro_Entidades_Integrantes_Red;
	/**
	* @var string
	*/
	protected $FK_Cod_Sector_Entidad;
	/**
	* @var string
	*/
	protected $FK_Cod_Pais;



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
	
	public function getNombreEntidadIntegranteRed(){
		return $this->Nombre_Entidad_Integrante_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setNombreEntidadIntegranteRed($NombreEntidadIntegranteRed){
		$this->Nombre_Entidad_Integrante_Red = $NombreEntidadIntegranteRed;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaCreacionEntidadIntegranteRed(){
		return $this->Fecha_Creacion_Entidad_Integrante_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaCreacionEntidadIntegranteRed($FechaCreacionEntidadIntegranteRed){
		$this->Fecha_Creacion_Entidad_Integrante_Red = $FechaCreacionEntidadIntegranteRed;
	}
	
	
	/**
	* Metodo para establecer el valor del campo FechaRetiroEntidadesIntegrantesRed
	* @param string $FechaRetiroEntidadesIntegrantesRed
	*/
	
	public function getFechaRetiroEntidadesIntegrantesRed(){
		return $this->Fecha_Retiro_Entidades_Integrantes_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo FechaRetiroEntidadesIntegrantesRed
	* @param string $FechaRetiroEntidadesIntegrantesRed
	*/

	public function setFechaRetiroEntidadesIntegrantesRed($Fecha_Retiro_Entidades_Integrantes_Red){
		$this->Fecha_Retiro_Entidades_Integrantes_Red = $Fecha_Retiro_Entidades_Integrantes_Red;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodSectorEntidad(){
		return $this->FK_Cod_Sector_Entidad;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodSectorEntidad($FKCodSectorEntidad){
		$this->FK_Cod_Sector_Entidad = $FKCodSectorEntidad;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodPais(){
		return $this->FK_Cod_Pais;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodPais($FKCodPais){
		$this->FK_Cod_Pais = $FKCodPais;
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