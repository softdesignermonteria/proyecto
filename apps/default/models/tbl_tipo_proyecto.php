<?php
class TblTipoProyecto extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Tipo_Proyecto;
	/**
	* @var string
	*/
	protected $Descripcion_Tipo_Proyecto;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActivCod_Tipo_ProyectoadesInvestigacion
	* @param string $CodActivCod_Tipo_ProyectoadesInvestigacion
	*/
	
	public function getCodTipoProyecto(){
		return $this->Cod_Tipo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActivCod_Tipo_ProyectoadesInvestigacion
	* @param string $CodActivCod_Tipo_ProyectoadesInvestigacion
	*/
	public function setCodTipoProyecto($Cod_Tipo_Proyecto){
		$this->Cod_Tipo_Proyecto = $Cod_Tipo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActivCod_Tipo_ProyectoadesInvestigacion
	* @param string $DescripcionActivCod_Tipo_ProyectoadesInvestigacion
	*/
	
	public function getDescripcionTipoProyecto(){
		return $this->Descripcion_Tipo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActivCod_Tipo_ProyectoadesInvestigacion
	* @param string $DescripcionActivCod_Tipo_ProyectoadesInvestigacion
	*/

	public function setDescripcionTipoProyecto($Descripcion_Tipo_Proyecto){
		$this->Descripcion_Tipo_Proyecto = $Descripcion_Tipo_Proyecto;
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