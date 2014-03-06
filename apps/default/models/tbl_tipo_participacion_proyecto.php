<?php
class TblTipoParticipacionProyecto extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Tipo_Participacion_Proyecto;
	/**
	* @var string
	*/
	protected $Descripcion_Tipo_Participacion_Proyecto;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodTipoParticipacionProyecto(){
		return $this->Cod_Tipo_Participacion_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodTipoParticipacionProyecto($Cod_Tipo_Participacion_Proyecto){
		$this->Cod_Tipo_Participacion_Proyecto = $Cod_Tipo_Participacion_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionTipoParticipacionProyecto(){
		return $this->Descripcion_Tipo_Participacion_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionTipoParticipacionProyecto($Descripcion_Tipo_Participacion_Proyecto){
		$this->Descripcion_Tipo_Participacion_Proyecto = $Descripcion_Tipo_Participacion_Proyecto;
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