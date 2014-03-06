<?php
class TblObjetivoSocioeconomico extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Objetivo_Socioeconomico;
	/**
	* @var string
	*/
	protected $Descripcion_Objetivo_Socioeconomico;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodObjetivoSocioeconomico(){
		return $this->Cod_Objetivo_Socioeconomico;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodObjetivoSocioeconomico($Cod_Objetivo_Socioeconomico){
		$this->Cod_Objetivo_Socioeconomico = $Cod_Objetivo_Socioeconomico;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionObjetivoSocioeconomico(){
		return $this->Descripcion_Objetivo_Socioeconomico;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionObjetivoSocioeconomico($Descripcion_Objetivo_Socioeconomico){
		$this->Descripcion_Objetivo_Socioeconomico = $Descripcion_Objetivo_Socioeconomico;
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