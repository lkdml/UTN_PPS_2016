<?php
namespace Modelo;
/**
 * @Entity @Table(name="Categoria_Anuncio")
 **/
class Categoria_Anuncio {
 
  	/** 
 	 * @Id @Column(type="integer") @GeneratedValue 
 	 * @var int
 	 */
 	 protected $Categoria_ID;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Nombre; 	 
 	

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