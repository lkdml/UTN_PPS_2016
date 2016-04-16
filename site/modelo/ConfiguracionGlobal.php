<?php
namespace Modelo;
/**
 * @Entity @Table(name="Configuracion_Global")
 **/
class Configuracion_Global {
 
	/**
	 * @Id @Column(type="string") @GeneratedValue 
	 * @var string
	 */
 	 protected $Nombre;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Valor; 	 

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