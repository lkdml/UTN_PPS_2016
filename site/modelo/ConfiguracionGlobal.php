<?php
namespace Modelo;
require_once($_SERVER["DOCUMENT_ROOT"].'/core/controlador/AutoLoaderClass.php');

use \Modelo\db\DbConfiguracionGlobal as DbConfiguracionGlobal;

class ConfiguracionGlobal {
 	
 	private $configuraciones;
	private $decorador;

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
	
	public function __construct(){
		$this->decorador = new DbConfiguracionGlobal($this);
	}
	
	public function getValue($key){
		$this->configuraciones = $this->decorador->traerConfiguracion($key);
	}


}

?>