<?php
class TblFuenteFInternacionalProyecto extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $id;
	/**
	* @var integer
	*/
	protected $FK_Cod_Fuente_F_Internacional;
	/**
	* @var integer
	*/
	protected $FK_Cod_Proyecto;

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

	public function setFKCodFuenteFInternacional($FKCodFuenteFInternacional){
		$this->FK_Cod_Fuente_F_Internacional = $FKCodFuenteFInternacional;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodProyecto(){
		return $this->FK_Cod_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodProyecto($FKCodProyecto){
		$this->FK_Cod_Proyecto = $FKCodProyecto;
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