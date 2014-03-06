<?php
class TblInvestigadorExterno extends ActiveRecord{
	
	/**
	* @var integer
	*/
	protected $tipo_identificacion;
	/**
	* @var integer
	*/
	protected $Identificacion_Externo;
	/**
	* @var string
	*/
	protected $PrimerNombre;
	/**
	* @var integer
	*/
	protected $SegundoNombre;
	/**
	* @var string
	*/
	protected $PrimerApellido;
	/**
	* @var integer
	*/
	protected $SegundoApellido;
	/**
	* @var string
	*/
	protected $correo;
	/**
	* @var string
	*/
	protected $telefono;
	/**
	* @var string
	*/
	protected $fax;
	/**
	* @var string
	*/
	protected $FK_Cod_IES;
	/**
	* @var integer
	*/
	protected $FK_Cod_NBC;
	/**
	* @var string
	*/
	protected $FK_Cod_Nivel_Educativo;
	/**
	* @var string
	*/
	protected $FK_Cod_Tipo_Participacion_Proyecto;
	/**
	* @var string
	*/
	protected $Cod_Sector_Entidad;

	public function initialize(){
       
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getTipoIdentificacion(){
		return $this->tipo_identificacion;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function setTipoIdentificacion($tipo_identificacion){
		$this->tipo_identificacion = $tipo_identificacion ; 
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getIdentificacion(){
		return $this->Identificacion_Externo;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function setIdentificacion($Indentificacion){
		$this->Identificacion_Externo = $Indentificacion ; 
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setPrimerNombre($PrimerNombre){
		$this->PrimerNombre = $PrimerNombre;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getPrimerNombre(){
		return $this->PrimerNombre;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setSegundoNombre($SegundoNombre){
		$this->SegundoNombre = $SegundoNombre;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getSegundoNombre(){
		return $this->SegundoNombre;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setPrimerApellido($PrimerApellido){
		$this->PrimerApellido = $PrimerApellido;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getPrimerApellido(){
		return $this->PrimerApellido;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setSegundoApellido($SegundoApellido){
		$this->SegundoApellido = $SegundoApellido;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getSegundoApellido(){
		return $this->SegundoApellido;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCorreo($correo){
		$this->correo = $correo;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getCorreo(){
		return $this->correo;
	}
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	
	public function getFax(){
		return $this->fax;
	}
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFax($fax){
		$this->fax = $fax;
	}
	
	
	/**
	* Metodo para establecer el valor del campo CodActividadesInvestigacion
	* @param string $CodActividadesInvestigacion
	*/
	public function setFKCodIES($FK_Cod_IES){
		$this->FK_Cod_IES = $FK_Cod_IES;
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

	public function setFKCodNBC($FK_Cod_NBC){
		$this->FK_Cod_NBC = $FK_Cod_NBC;
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

	public function seFKCodNivelEducativo($FK_Cod_Nivel_Educativo){
		$this->FK_Cod_Nivel_Educativo = $FK_Cod_Nivel_Educativo;
	}
	
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodNivelEducativo(){
		return $this->FK_Cod_Nivel_Educativo;
	}
	
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setFKCodTipoParticipacionProyecto($FK_Cod_Tipo_Participacion_Proyecto){
		$this->FK_Cod_Tipo_Participacion_Proyecto = $FK_Cod_Tipo_Participacion_Proyecto;
	}
	
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getFKCodTipoParticipacionProyecto(){
		return $this->FK_Cod_Tipo_Participacion_Proyecto;
	}
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/

	public function setCodSectorEntidad($Cod_Sector_Entidad){
		$this->Cod_Sector_Entidad = $Cod_Sector_Entidad;
	}
	
	
	/**
	* Metodo para establecer el valor del campo DescripcionActividadesInvestigacion
	* @param string $DescripcionActividadesInvestigacion
	*/
	
	public function getCodSectorEntidad(){
		return $this->Cod_Sector_Entidad;
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