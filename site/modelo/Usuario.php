<?php
namespace Modelo;

/**
 * @Entity @Table(name="Usuario")
 **/
class Usuario {
 	/** 
 	 * @Id @Column(type="integer") @GeneratedValue 
 	 * @var int
 	 */
 	protected $Usuario_ID;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Nombre_Usuario;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Clave;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Nombre;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Apellido;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $Email;
	/**
	 * @Column(type="string" , nullable=true)
	 * @var string
	 */
	protected $FotoHash;
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	protected $Direccion;
	/**
	 * @Column(type="integer" , nullable=true)
	 * @var int
	 */
	protected $Codigo_Postal;
	/**
	 * @Column(type="integer", nullable=true)
	 * @var int
	 */
	protected $Ciudad_ID;
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	protected $Telefono;
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	protected $Mail_Adicional;
	/**
	 * @OneToOne (targetEntity="Empresa", mappedBy="Empresa_ID") 
	 */
	protected $Empresa_ID;
	/**
	 * @Column(type="integer", nullable=true)
	 * @var integer
	 */
	protected $Ultima_Actualizacion;
	/**
	 * @Column(type="integer", nullable=true)
	 * @var integer
	 */
	protected $Ultima_Actividad;
	/**
	 * @Column(type="boolean", nullable=true)
	 * @var boolean
	 */
	protected $Activo;
	/**
	 * @Column(type="boolean", nullable=true)
	 * @var boolean
	 */
	protected $Eliminado;





 	public function getUsuario_ID(){return $this->Usuario_ID;}
 	public function getNombre_Usuario(){return $this->Nombre_Usuario;}
 	public function getClave(){return $this->Clave;}
 	public function getNombre(){return $this->Nombre;}
 	public function getApellido(){return $this->Apellido;} 	
 	public function getEmail(){return $this->Email;} 	
 	public function getFotoHash(){return $this->FotoHash;} 	
 	public function getDireccion(){return $this->Direccion;} 	
 	public function getCodigo_Postal(){return $this->Codigo_Postal;} 	
 	public function getCiudad_ID(){return $this->Ciudad_ID;} 	
 	public function getTelefono(){return $this->Telefono;} 	
 	public function getMail_Adicional(){return $this->Mail_Adicional;} 	
 	public function getEmpresa_ID(){return $this->Empresa_ID;} 	
 	public function getUltima_Actualizacion(){return $this->Ultima_Actualizacion;}
 	public function getUltima_Actividad(){return $this->Ultima_Actividad;}
 	public function getActivo(){return $this->Activo;}
 	public function getEliminado(){return $this->Eliminado;}
 	
 	public function setNombre_Usuario($username){ $this->Nombre_Usuario = $username;}
 	public function setClave($Clave){ $this->Clave = $Clave;}
 	public function setNombre($nombre){ $this->Nombre = $nombre;}
 	public function setApellido($apellido){ $this->Apellido = $apellido;} 	
 	public function setEmail($email){ $this->Email = $email;} 	
 	public function setFotoHash($fotoHash){ $this->FotoHash = $fotoHash;} 	
 	public function setDireccion($direccion){ $this->Direccion = $direccion;} 	
 	public function setCodigo_Postal($cp){ $this->Codigo_Postal = $cp;} 	
 	public function setCiudad_ID($id){ $this->Ciudad_ID = $id;} 	
 	public function setTelefono($telefono){ $this->Telefono = $telefono;} 	
 	public function setMail_Adicional($mail2){ $this->Mail_Adicional = $mail2;} 	
 	//public function setEmpresa_ID($id){ $this->Empresa_ID = $id;} 	
 	public function setUltima_Actualizacion($ultimaActualizacion){ $this->Ultima_Actualizacion = $ultimaActualizacion;}
 	public function setUltima_Actividad($ultimaActividad){ $this->Ultima_Actividad = $ultimaActividad;}
 	public function setActivo($bool){ $this->Activo = $bool;}
 	public function setEliminado($bool){ $this->Eliminado = $bool;}	
	

}

?>