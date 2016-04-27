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
 	protected $Anuncio_ID;
	/**
	 * @ManyToMany(targetEntity="Empresa")
     * @JoinTable(name="Anuncios_Empresas",
     *      joinColumns={@JoinColumn(name="Anuncio_ID", referencedColumnName="Anuncio_ID")},
     *      inverseJoinColumns={@JoinColumn(name="Empresa_ID", referencedColumnName="Empresa_ID")}
     *      )
     * @var Empresa_ID[]
	 */
	protected $Empresa_ID;
	/**
	 * @OneToOne (targetEntity="Categoria_Anuncio")
     * @JoinColumn(name="Categoria_ID", referencedColumnName="Categoria_ID")
	 */
	protected $Categoria_ID;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Titulo;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Contenido;
	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	protected $Fecha_Creacion;
	/**
	 * @Column(type="boolean")
	 * @var boolean
	 */
	protected $Estado;
	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	protected $Fecha_Fin_Publicacion;


	public function getAnuncio_ID(){return $this->Anuncio_ID;}
	public function getEmpresa_ID(){return $this->Empresa_ID;}
	public function getCategoria_ID(){return $this->Categoria_ID;}
	public function getTitulo(){return $this->Titulo;}
	public function getContenido(){return $this->Contenido;}
	public function getFecha_Creacion(){return $this->Fecha_Creacion;}
	public function getEstado(){return $this->Estado;}
	public function getFecha_Fin_Publicacion(){return $this->Fecha_Fin_Publicacion;}
	
	public function setEmpresa_ID($empresa_ID){ $this->Empresa_ID = $empresa_ID;}
	public function setCategoria_ID($categoria_ID){ $this->Categoria_ID = $categoria_ID;}
	public function setTitulo($titulo){ $this->Titulo = $titulo;}
	public function setContenido($contenido){ $this->Contenido = $contenido;}
	public function setFecha_Creacion($fecha_Creacion){$this->Fecha_Creacion = $fecha_Creacion;}
	public function setEstado($estado){ $this->Estado = $estado;}
	public function setFecha_Fin_Publicacion($fecha_Fin_Publicacion){ $this->Fecha_Fin_Publicacion = $fecha_Fin_Publicacion;}
	
	public function __construct() {
        $this->Empresa_ID = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}

?>