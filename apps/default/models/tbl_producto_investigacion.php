<?php
class TblProductoInvestigacion extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Producto_Investigacion;
	/**
	* @var string
	*/
	protected $Descripcion_Producto_Investigacion;
	/**
	* @var string
	*/
	protected $Ano_Obtecion;
	/**
	* @var string
	*/
	protected $Mes_Obtencion;
	/**
	* @var string
	*/
	protected $FK_Tipo_Producto;
	/**
	* @var string
	*/
	protected $FK_NBC;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodProductoInvestigacion(){
		return $this->Cod_Producto_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodProductoInvestigacion($Cod_Producto_Investigacion){
		$this->Cod_Producto_Investigacion = $Cod_Producto_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDescripcionProductoInvestigacion(){
		return $this->Descripcion_Producto_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDescripcionProductoInvestigacion($Descripcion_Producto_Investigacion){
		$this->Descripcion_Producto_Investigacion = $Descripcion_Producto_Investigacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getAnoObtecion(){
		return $this->Ano_Obtecion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setAnoObtecion($Año_Obtecion){
		$this->Ano_Obtecion = $Año_Obtecion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getMesObtencion(){
		return $this->Mes_Obtencion;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setMesObtencion($Mes_Obtencion){
		$this->Mes_Obtencion = $Mes_Obtencion;
	}

	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKTipoProducto(){
		return $this->FK_Tipo_Producto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKTipoProducto($FK_Tipo_Producto){
		$this->FK_Tipo_Producto = $FK_Tipo_Producto;
	}
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKNBC(){
		return $this->FK_NBC;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKNBC($FK_NBC){
		$this->FK_NBC = $FK_NBC;
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