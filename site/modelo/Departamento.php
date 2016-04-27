<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Departamento")
 **/
class Departamento {
    /** 
     * @Id @Column(type="integer") @GeneratedValue 
     * @var int
     */
    protected $Departamento_ID;
    /**
     * @Column(type="string")
     * @var string
     */
    Protected $Nombre;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Descripcion;
    /**
     * OneToOne(targetEntity="Departamento")
     * @JoinColumn(name="ID_Depto_Padre", referencedColumnName="Departamento_ID")
     * 
     */
    protected $ID_Depto_Padre;
    /**
     * @Column(type="boolean")
     * @var boolean
     */
    protected $Visibilidad_Usuario;
    /**
     * @Column(type="smallint")
     * @var smallint
     */
    protected $Orden;
    /**
     * @ManyToMany(targetEntity="Operador")
     * @JoinTable(name="OperadoresXDefecto_Departamentos",
     *      joinColumns={@JoinColumn(name="Departamento_ID", referencedColumnName="Departamento_ID")},
     *      inverseJoinColumns={@JoinColumn(name="Operador_ID", referencedColumnName="Operador_ID")}
     *      )
     */
    protected $Operador_Default_ID;
    /**
     * @ManyToMany(targetEntity="Operador",mappedBy="Operador_ID")
     * 
     * 
     */
    protected $Operadores;
    
    public function __construct() {
        $this->Operadores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Operador_Default_ID = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getDepartamento_ID() {return $this->Departamento_ID; }
    public function getNombre() {return $this->Nombre;}
    public function getDescripcion() {return $this->Descripcion;}
    public function getID_Depto_Padre() {return $this->ID_Depto_Padre;}
    public function getVisibilidad_Usuario() {return $this->Visibilidad_Usuario;}
    public function getOrden() {return $this->Orden;}
    public function getOperador_Default_ID() {return $this->Operador_Default_ID;}
    public function getOperadores() {return $this->Operadores;}
    
    public function setNombre($nombre) { $this->Nombre = $nombre;}
    public function setDescripcion($desc) { $this->Descripcion = $desc;}
    public function setID_Depto_Padre($dpto_padre) { $this->ID_Depto_Padre = $dpto_padre;}
    public function setVisibilidad_Usuario($visible) { $this->Visibilidad_Usuario =$visible;}
    public function setOrden($orden) { $this->Orden =$orden;}
    public function setOperador_Default_ID($operadores_def) { $this->Operador_Default_ID =$operadores_def;}
    public function setOperadores( $operador) { $this->Operadores = $operador;}
    
    public function agregarOperador(Operador $operador) {
      $this->Operadores[] = $operador;
    }
}
?>
