<?php
namespace Modelo;
/**
 * @Entity @Table(name="Rol")
 **/
class Rol {
 	/** 
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
	protected $Rol_ID;
    /**
     * @Column(type="string")
     * @var string
     */
	protected $Nombre;
    /**
     * @Column(type="string")
     * @var string
     */
	protected $Descripcion;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
	private $Estado;
    /**
     * @ManyToMany(targetEntity="Perfil", mappedBy="Perfil_ID")
     * 
     */
    protected $Perfiles;
    
    public function __construct(){
        $this->Perfil_ID = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRol_ID(){return $this->Rol_ID;} 
    public function getNombre(){return $this->Nombre;} 
    public function getDescripcion(){return $this->Descripcion; }
    public function getEstado(){return $this->Estado;}
    public function getPerfiles() {return $this->Perfiles;}
    
    public function setNombre($nombre){$this->Nombre = $nombre;} 
    public function setDescripcion($descripcion){$this->Descripcion = $descripcion;}
    public function setEstado($estado){$this->Estado = $estado;}
    public function setPerfiles(Perfil[] $perfil){$this->Perfiles[] = $perfil;    }
    
    public function agregarPerfil(Perfil $perfil){
        $this->Perfiles[] = Perfil;
    }

}

?>