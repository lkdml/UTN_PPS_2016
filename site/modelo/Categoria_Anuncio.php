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
	
	public function getCategoria_ID() { return $this->Categoria_ID;}
	public function getNombre() { return $this->Anuncios;}
	
	public function setNombre() {$this->Nombre;}



}

?>