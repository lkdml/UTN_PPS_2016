<?php
namespace Modelo;
/**
 * @Entity @Table(name="Perfil")
 **/
class Perfil {
    /** 
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
    protected $Perfil_ID;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Nombre;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
    protected $Estado;
    /**
     * @ManyToMany(targetEntity="Rol")
     * @JoinTable(name="perfiles_roles",
     *      joinColumns={@JoinColumn(name="Perfil_ID", referencedColumnName="Perfil_ID")},
     *      inverseJoinColumns={@JoinColumn(name="Rol_ID", referencedColumnName="Rol_ID")}
     *      )
     * @var[]
     * 
     */
    protected $Roles;   
    
    public function __construct(){
        $this->Roles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
	public function getPerfil() {return $this->Perfil_ID;}
    public function getNombre() {return $this->Nombre;}
    public function getEstado() {return $this->Estado;}
    public function getRoles() {return $this->Roles;}
    
    public function setNombre($nombre) { $this->Nombre = $nombre;}
    public function setEstado($estado) {$this->Estado = $estado;}
    public function setRoles($roles) {$this->Roles = $roles;}
    
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