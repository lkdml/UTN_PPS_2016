<?php

class Rol {
 	
	private $_Rol_ID;
	private $_Nombre;
	private $_Descripcion;
	private $_Estado;

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