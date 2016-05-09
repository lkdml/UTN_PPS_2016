<?php
namespace Modelo;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @Entity @Table(name="Perfil")
 **/
class Perfil {
    /** 
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Nombre;
    /**
     * @Column(type="string", nullable=true)
     * @var string
     */
    protected $Descripcion;
    
    /**
     * @Column(type="boolean")
     * @var boolean
     */
    protected $Estado;
    /**
     * @ManyToMany(targetEntity="Rol")
     * @JoinTable(name="perfiles_roles",
     *      joinColumns={@JoinColumn(name="Perfil_ID", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="Rol_ID", referencedColumnName="Nombre")}
     *      )
     * @var[]
     * 
     */
    protected $Roles;   
    
    /**
     * @OneToMany(targetEntity="Operador", mappedBy="Perfil")
     * @var Bug[]
     **/
    protected $Operadores = null;
    
    public function __construct(){
        $this->Roles = new \Doctrine\Common\Collections\ArrayCollection();
         $this->Operadores = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
	public function getId() {return $this->id;}
    public function getNombre() {return $this->Nombre;}
    public function getDescripcion() {return $this->Descripcion;}
    public function getEstado() {return $this->Estado;}
    public function getRoles() {return $this->Roles;}
    public function getOperadores() {return $this->Operadores;}
    
    public function setNombre($nombre) { $this->Nombre = $nombre;}
    public function setDescripcion($descripcion) { $this->Descripcion = $descripcion;}
    public function setEstado($estado) {$this->Estado = $estado;}
    public function setRoles($roles) {$this->Roles = $roles;}
    public function setOperadores($operador) {$this->Operadores = $operador;}
    
    /**
     * Asigna 
     *
     **/
    public function asignarRol(Rol $rol){
        $rol->agregarPerfil($this);
        $this->Roles[] = $rol;
        
    }
    
    
    
}



?>