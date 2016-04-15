<?php
namespace Modelo;
/**
 * @Entity @Table(name="Empresa")
 **/
class Empresa {
 
  	/** 
 	 * @Id @Column(type="integer") @GeneratedValue 
 	 * @var int
 	 */
    protected $Empresa_ID;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Razon_Social;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Pais;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Direccion;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Ciudad;
	/**
	 * @Column(type="string")
	 * @var string
	 */
    protected $Codigo_Postal;
	/**
	 * @Column(type="string")
	 * @var string
	 */
    protected $Telefono;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Web;
	/**
	 * @Column(type="datetime")
	 * @var datetime
	 */
	protected $Ultima_Actualizacion;
	/**
	 * @ManyToMany (targetEntity="Anuncio", mappedBy="Anuncio_ID") 
	 */
    protected $Anuncios;
    

    public function getEmpresa_Id() {return $this->Empresa_ID;}
	public function getRazon_Social() {return $this->Razon_Social;}
	public function getPais() {return $this->Pais;}
	public function getDireccion() {return $this->Direccion;}
	public function getCiudad() {return $this->Ciudad;}
    public function getCodigo_Postal() {return $this->Codigo_Postal;}
    public function getTelefono() {return $this->Telefono;}
	public function getWeb() {return $this->Web;}
	public function getUltima_Actualizacion() {return $this->Ultima_Actualizacion;}
    public function getAnuncios() {return $this->Anuncios;}
    
	public function setRazon_Social($Razon_Social) { $this->Razon_Social = $Razon_Social;}
	public function setPais($Pais) { $this->Pais = $Pais;}
	public function setDireccion($Direccion) { $this->Direccion = $Direccion;}
	public function setCiudad($Ciudad) { $this->Ciudad = $Ciudad;}
    public function setCodigo_Postal($Codigo_Postal) { $this->Codigo_Postal = $Codigo_Postal;}
    public function setTelefono($Telefono) { $this->Telefono = $Telefono;}
	public function setWeb($Web) { $this->Web = $Web;}
	public function setUltima_Actualizacion($Ultima_Actualizacion) { $this->Ultima_Actualizacion = $Ultima_Actualizacion;}
    public function setAnuncios($Anuncios) { $this->Anuncios = $Anuncios;}
}

?>