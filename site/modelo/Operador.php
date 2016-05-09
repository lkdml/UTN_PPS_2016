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
     * ManyToOne(targetEntity="Perfil")
     * JoinColumn(name="Perfil", referencedColumnName="id")
     */
     /**
     * @ManyToOne(targetEntity="Perfil", inversedBy="Operadores")
     **/
 	protected $Perfil;
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
     * @Column(type="string", unique=true)
     * @var string
     */
 	protected $Nombre_Usuario;
    /**
     * @Column(type="string")
     * @var string
     */
 	protected $Clave;
    /**
     * @Column(type="string", nullable=true)
     * @var string
     */
 	protected $Firma_Mensaje;
    /**
     * @Column(type="string", unique=true)
     * @var string
     */
 	protected $Email;
    /**
     * @Column(type="string", nullable=true)
     * @var string
     */
 	protected $Celular;
    /**
     * @Column(type="datetime")
     * @var datetime
     */
 	protected $Ultima_Actualizacion;
    /**
     * @Column(type="datetime")
     * @var datetime
     */
 	protected $Ultima_Actividad;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Activo;
    /**
     * @ManyToMany(targetEntity="Departamento")
     * @JoinTable(name="Operadores_Departamentos",
     *      joinColumns={@JoinColumn(name="Operador_ID", referencedColumnName="Operador_ID")},
     *      inverseJoinColumns={@JoinColumn(name="Departamento_ID", referencedColumnName="Departamento_ID")}
     *      )
     * @var Deptos_Habilitados[]
     */
 	protected $Deptos_Habilitados;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Habilita_Notificaciones_Mail;
    //TODO
    /**
     * ManyToMany(targetEntity="Filtro_Ticket", inversedBy="Filtro_ID")
     * JoinTable(name="Operadores_Filtros")
     * @var Filtro_Ticket_ID[]
     */
 	protected $Filtro_Ticket_ID;
    /**
     * @Column(type="string", nullable=true)
     * @var string
     */
 	protected $HashFoto;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
 	protected $Eliminado;
    
    public function __construct() {
        $this->Deptos_Habilitados = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->$Filtro_Ticket_ID = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getOperador_ID() {return $this->Operador_ID;}
    public function getPerfil() {return $this->Perfil;}
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
    
    public function setPerfil(Perfil $perfil) {$this->Perfil= $perfil;}
    public function setNombre($nombre) {$this->Nombre =$nombre;}    
    public function setApellido($apellido) {$this->Apellido = $apellido;}
    public function setNombre_Usuario($usuario) {$this->Nombre_Usuario = $usuario;}
    public function setClave($clave) {
        $opciones = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $this->Clave = password_hash($clave, PASSWORD_BCRYPT, $opciones);}
    public function setFirma_Mensaje($firma) {$this->Firma_Mensaje =$firma;}
    public function setEmail($email) {$this->Email =$email;}
    public function setCelular($celular) {$this->Celular =$celular;}
    public function setUltima_Actualizacion() {$this->Ultima_Actualizacion = new \DateTime("now"); }
    public function setUltima_Actividad(){$this->Ultima_Actividad = new \DateTime("now");}
    public function setActivo($activo) {$this->Activo = $activo;}
    public function setDeptos_Habilitados($deptos) {$this->Deptos_Habilitados = $deptos;}
    public function setHabilita_Notificaciones_Mail($bool) {$this->Habilita_Notificaciones_Mail = $bool;}
    public function setFiltro_Ticket_ID($filtro) {$this->Filtro_Ticket_ID = $filtro;}
    public function setHashFoto($hashFoto) {$this->HashFoto = $hashFoto;}
    public function setEliminado($eliminado) {$this->Eliminado =$eliminado;}

   public function asignarDepartamento(Departamento $depto) {
       $depto->agregarOperador($this);
       $this->Deptos_Habilitados = $depto;
   }

    public function eliminarUsuario(){
        $this->Eliminado = true;
    }
    
    public function verificarClave($clave){
        return password_verify($clave,$this->getClave());
    }

}

?>