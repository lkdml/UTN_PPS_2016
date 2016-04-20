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
     * @ManyToMany(targetEntity="Rol", mappedBy="Rol_ID")
     * @var Rol[]
     */
    protected $Roles;    
    
	public function getPerfil() {return $this->Perfil_ID;}
    public function getNombre() {return $this->Nombre;}
    public function getEstado() {return $this->Estado;}
    public function getRoles() {return $this->Roles;}
    
    public function setNombre($nombre) { $this->Nombre = $nombre;}
    public function setEstado($estado) {$this->Estado = $estado;}
    public function setRoles($roles) {$this->Roles = $roles;}
}

?>