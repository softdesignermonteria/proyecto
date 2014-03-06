<?php



class Menu extends ActiveRecord{

	

	protected $id;

	protected $aplicacion;

	protected $posicion;

	protected $posicion_x;

	protected $posicion_y;
	
	protected $orden;

	protected $descripcion;

	protected $tittle;

	protected $url;




	public function initialize(){

       

	}

	

	public function getId(){

		return $this->id;

	}

	

	public function setId($id){

		$this->id = $id;

	}

	

	public function getAplicacion(){

		return $this->aplicacion;

	}

	

	public function setAplicacion($aplicacion){

		$this->aplicacion = $aplicacion;

	}

	

	

	public function getPosicion(){

		return $this->posicion;

	}

	

	public function setPosicion($posicion){

		$this->posicion = $posicion;

	}

	

	

	public function getPosicion_x(){

		return $this->posicion_x;

	}

	

	public function setPosicion_x($posicion_x){

		$this->posicion_x = $posicion_x;

	}

	

	public function getPosicion_y(){

		return $this->posicion_y;

	}

	

	public function setPosicion_y($posicion_y){

		$this->posicion_y = $posicion_y;

	}

	
	public function getOrden(){

		return $this->orden;

	}

	

	public function setOrden($orden){

		$this->orden = $orden;

	}

	

	public function getDescripcion(){

		return $this->descripcion;

	}

	

	public function setDescripcion($descripcion){

		$this->descripcion = $descripcion;

	}

	

	

	public function getTittle(){

		return $this->tittle;

	}

	

	public function setTittle($tittle){

		$this->tittle = $tittle;

	}

	

	

	public function getUrl(){

		return $this->url;

	}

	

	public function setUrl($url){

		$this->url = $url;

	}

	

	

	/*public function before_save(){



            if($this->tipo_usuario == 0 ){

                Flash::error("Debe escoger un tipo de usuario");

                return 'cancel';

            }

      

    }*/



}



?>