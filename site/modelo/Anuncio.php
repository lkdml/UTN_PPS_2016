<?php

class Anuncio {
 	
	private $_Empresa_ID;
	private $_Categoria_ID;
	private $_Titulo;
	private $_Contenido;
	private $_Fecha_Creacion;
	private $_Estado;
	private $_Fecha_Fin_Publicacion;

	public function __get($property) {
	if (property_exists($this, $property)) {
	  return $this->$property;
	}
	}
	
	public function __set($property, $value) {
	if (property_exists($this, $property)) {
	  $this->$property = $value;
	}
	
	return $this;
	}

}

?>