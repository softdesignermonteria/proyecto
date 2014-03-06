<?php
class TblCentrosInvestigacionProyectos extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var integer
	*/
	protected $Cod_Proyecto;
	/**
	* @var integer
	*/
	protected $Cod_Centro_Investigacion;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo id
	* @param string $id
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
	
	public function getCodProyecto(){
		return $this->Cod_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCodProyecto($CodProyecto){
		$this->Cod_Proyecto = $CodProyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getCodCentroInvestigacion(){
		return $this->Cod_Centro_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCodCentroInvestigacion($CodCentroInvestigacion){
		$this->Cod_Centro_Investigacion = $CodCentroInvestigacion;
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