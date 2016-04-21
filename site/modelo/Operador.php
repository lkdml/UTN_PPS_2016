<?php
namespace Modelo;

/**
 * @Entity @Table(name="Operador")
 **/
class Operador {
 	/** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
 	protected $Operador_ID;
    /**
     * @ManyToOne(targetEntity="Perfil")
     */
 	protected $Perfil_ID;
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
 	protected $Firma_Mensaje;
    /**
     * @Column(type="string")
     * @var string
     */
 	protected $Email;
    /**
     * @Column(type="string")
     * @var string
     */
 	protected $Celular;
    /**
     * @Column(type="datetimez")
     * @var datetime
     */
 	protected $Ultima_Actualizacion;
    /**
     * @Column(type="datetimez")
     * @var datetime
     */
 	protected $Ultima_Actividad;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Activo;
    /**
     * @ManyToMany(targetEntity="Departamentos", inversedBy="Departamento_ID")
     * @JoinTable(name="Operadores_Departamentos")
     */
 	protected $Deptos_Habilitados;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Habilita_Notificaciones_Mail;
    /**
     * @ManyToMany(targetEntity="Filtro_Ticket", inversedBy="Filtro_ID")
     * @JoinTable(name="Operadores_Filtros")
     */
 	protected $Filtro_Ticket_ID;
    /**
     * @Column(type="string")
     * @var string
     */
 	protected $HashFoto;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Eliminado;
    
    
    public function getOperador_ID() {return $this->Operador_ID;}
    public function getPerfil_ID() {return $this->Perfil_ID;}
    public function getNombre() {return $this->Nombre;}    
    public function getApellido() {return $this->Apellido;}
    public function getNombre_Usuario() {return $this->Nombre_Usuario;}
    public function getClave() {return $this->Clave;}
    public function getFirma_Mensaje() {return $this->Firma_Mensaje;}
    public function getEmail() {return $this->Email;}
    public function getCelular() {return $this->Celular;}
    public function getUltima_Actualizacion() {return $this->Ultima_Actualizacion;}
    public function getUltima_Actividad() {return $this->Ultima_Actividad;}
    public function getActivo() {return $this->Activo;}
    public function getDeptos_Habilitados() {return $this->Deptos_Habilitados;}
    public function getHabilita_Notificaciones_Mail() {return $this->Habilita_Notificaciones_Mail;}
    public function getFiltro_Ticket_ID() {return $this->Filtro_Ticket_ID;}
    public function getHashFoto() {return $this->HashFoto;}
    public function getEliminado() {return $this->Eliminado;}
    
    public function setPerfil_ID($id) {$this->Perfil_ID= $id;}
    public function setNombre($nombre) {$this->Nombre =$nombre;}    
    public function setApellido($apellido) {$this->Apellido = $apellido;}
    public function setNombre_Usuario($usuario) {$this->Nombre_Usuario = $usuario;}
    public function setClave($clave) {$this->Clave = $clave;}
    public function setFirma_Mensaje($firma) {$this->Firma_Mensaje =$firma;}
    public function setEmail($email) {$this->Email =$email;}
    public function setCelular($celular) {$this->Celular =$celular;}
    public function setUltima_Actualizacion($lastUpdate) {$this->Ultima_Actualizacion = $lastUpdate;}
    public function setUltima_Actividad($lastActividad) {$this->Ultima_Actividad =$lastActividad;}
    public function setActivo($activo) {$this->Activo = $activo;}
    public function setDeptos_Habilitados($deptos) {$this->Deptos_Habilitados = $deptos;}
    public function setHabilita_Notificaciones_Mail($bool) {$this->Habilita_Notificaciones_Mail = $bool;}
    public function setFiltro_Ticket_ID($filtro) {$this->Filtro_Ticket_ID = $filtro;}
    public function setHashFoto($hashFoto) {$this->HashFoto = $hashFoto;}
    public function setEliminado($eliminado) {$this->Eliminado =$eliminado;}

   


}

?>