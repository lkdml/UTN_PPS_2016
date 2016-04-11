<?php

class Empresa {
 
    private $_Razon_Social;
    private $_Pais;
    private $_Direccion;
    private $_Ciudad;
    private $_Codigo_Postal;
    private $_Telefono;
    private $_Web;
    private $_Ultima_Actualizacion;
    private $_Sla_Plan_ID;
    private $_Perfil_Default_ID;
    private $_Anuncios;
    

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