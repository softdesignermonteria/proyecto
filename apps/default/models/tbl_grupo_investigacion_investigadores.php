<?php
class TblGrupoInvestigacionInvestigadores extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var string
	*/
	protected $Cod_Grupo_Investigacion;
	/**
	* @var string
	*/
	protected $Identificacion_Investigador;


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
	
	public function getCodGrupoInvestigacion(){
		return $this->Cod_Grupo_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCodGrupoInvestigacion($Cod_Grupo_Investigacion){
		$this->Cod_Grupo_Investigacion = $Cod_Grupo_Investigacion;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getIdentificacionInvestigador(){
		return $this->Identificacion_Investigador;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setIdentificacionInvestigador($Identificacion_Investigador){
		$this->Identificacion_Investigador = $Identificacion_Investigador;
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