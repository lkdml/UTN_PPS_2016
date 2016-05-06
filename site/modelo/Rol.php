<?php
namespace Modelo;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity @Table(name="Rol")
 **/
class Rol extends EntityRepository{

    /**
     * @Id @GeneratedValue(strategy="NONE")  @Column(type="string")
     * @var string
     */
	protected $Nombre;
    /**
     * @Column(type="string")
     * @var string
     */
	protected $Descripcion;
    /** //TODO Saco el Estado
     * Column(type="boolean")
     * var boolean
     */
	private $Estado;
    /**
     * ManyToMany(targetEntity="Perfil", mappedBy="Perfil_ID")
     * 
     */
    protected $Perfiles;
    
    public function __construct(){
        $this->Perfiles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(){return $this->id;} 
    public function getNombre(){return $this->Nombre;} 
    public function getDescripcion(){return $this->Descripcion; }
    //public function getEstado(){return $this->Estado;}
    public function getPerfiles() {return $this->Perfiles;}
    
    public function setNombre($nombre){$this->Nombre = $nombre;} 
    public function setDescripcion($descripcion){$this->Descripcion = $descripcion;}
    //public function setEstado($estado){$this->Estado = $estado;}
    public function setPerfiles(Perfil $perfil){$this->Perfiles = $perfil;}
    
    public function agregarPerfil(Perfil $perfil){
        $this->Perfiles[] = Perfil;
    }
    
    


}
?>