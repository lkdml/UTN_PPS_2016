<?php

class Perfil {
 	
    private $_Perfil_ID;
    private $_Nombre;
    private $_Estado;
    private $_Roles;

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