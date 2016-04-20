<?php
namespace Modelo;
/**
 * @Entity @Table(name="Anuncio")
 **/
class Anuncio {
 
  	/** 
 	 * @Id @Column(type="integer") @GeneratedValue 
 	 * @var int
 	 */
 	private $Anuncio_ID;
	/**
	 * @ManyToOne (targetEntity="Empresa", inversedBy="Empresa_ID")
     * @JoinTable(name="Anuncios_Empresas") 
	 */
	private $Empresa_ID;
	/**
	 * @ManyToOne (targetEntity="Categoria_Anuncio", inversedBy="Categoria_ID")
     * @JoinTable(name="perfiles_roles") 
	 */
	private $Categoria_ID;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $Titulo;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $Contenido;
	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	private $Fecha_Creacion;
	/**
	 * @Column(type="boolean")
	 * @var boolean
	 */
	private $Estado;
	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	private $Fecha_Fin_Publicacion;
	/**
	 * @ManyToOne (targetEntity="Operador", inversedBy="Operador_ID") 
     * 
	 */
	private $Operador_ID;

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