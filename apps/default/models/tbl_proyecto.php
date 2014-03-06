<?php
class TblProyecto extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $Cod_Proyecto;
	/**
	* @var string
	*/
	protected $FK_Cod_IES;
	/**
	* @var integer
	*/
	protected $Titulo_Proyecto;
	/**
	* @var string
	*/
	protected $Fecha_Inicio_Proyecto;
	/**
	* @var integer
	*/
	protected $FK_Tipo_Proyecto;
	/**
	* @var string
	*/
	protected $Duracion_Proyecto;
	/**
	* @var integer
	*/
	protected $FK_Cod_Objeto_Socieconomico;
	/**
	* @var string
	*/
	protected $Objetivo_Proyecto;
	/**
	* @var string
	*/
	protected $Resumen_Proyecto;

	/**
	* @var string
	*/
	protected $Resultados_Esperados;
	/**
	* @var string
	*/
	protected $Valor_Proyecto;


	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCodProyecto(){
		return $this->Cod_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setCodProyecto($Cod_Proyecto){
		$this->Cod_Proyecto = $Cod_Proyecto;
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
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getTituloProyecto(){
		return $this->Titulo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setTituloProyecto($Titulo_Proyecto){
		$this->Titulo_Proyecto = $Titulo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFechaInicioProyecto(){
		return $this->Fecha_Inicio_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFechaInicioProyecto($Fecha_Inicio_Proyecto){
		$this->Fecha_Inicio_Proyecto = $Fecha_Inicio_Proyecto;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getFKTipoProyecto(){
		return $this->FK_Tipo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setFKTipoProyecto($FK_Tipo_Proyecto){
		$this->FK_Tipo_Proyecto = $FK_Tipo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getDuracionProyecto(){
		return $this->Duracion_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setDuracionProyecto($Duracion_Proyecto){
		$this->Duracion_Proyecto = $Duracion_Proyecto;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getFKCodObjetoSocieconomico(){
		return $this->FK_Cod_Objeto_Socieconomico;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setFKCodObjetoSocieconomico($FK_Cod_Objeto_Socieconomico){
		$this->FK_Cod_Objeto_Socieconomico = $FK_Cod_Objeto_Socieconomico;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getObjetivoProyecto(){
		return $this->Objetivo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setObjetivoProyecto($Objetivo_Proyecto){
		$this->Objetivo_Proyecto = $Objetivo_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getResumenProyecto(){
		return $this->Resumen_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setResumenProyecto($Resumen_Proyecto){
		$this->Resumen_Proyecto = $Resumen_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getResultadosEsperados(){
		return $this->Resultados_Esperados;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setResultadosEsperados($Resultados_Esperados){
		$this->Resultados_Esperados = $Resultados_Esperados;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getValorProyecto(){
		return $this->Valor_Proyecto;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setValorProyecto($Valor_Proyecto){
		$this->Valor_Proyecto = $Valor_Proyecto;
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