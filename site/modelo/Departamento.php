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
     * @ManyToOne(targetEntity="Departamento", inversedBy="Departamento_ID")
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
     * @JoinTable(name="Departamentos_OperadoresXDefecto",
     *      joinColumns={@JoinColumn(name="Operador_Default_ID", referencedColumnName="Operador_Default_ID")},
     *      inverseJoinColumns={@JoinColumn(name="Operador_ID", referencedColumnName="Operador_ID")}
     *      )
     */
    protected $Operador_Default_ID;
    
    
    public function getDepartamento_ID() {return $this->Departamento_ID; }
    public function getNombre() {return $this->Nombre;}
    public function getDescripcion() {return $this->Descripcion;}
    public function getID_Depto_Padre() {return $this->ID_Depto_Padre;}
    public function getVisibilidad_Usuario() {return $this->Visibilidad_Usuario;}
    public function getOrden() {return $this->Orden;}
    public function getOperador_Default_ID() {return $this->Operador_Default_ID;}
    
    public function setNombre($nombre) {return $this->Nombre = $nombre;}
    public function setDescripcion($desc) {return $this->Descripcion = $desc;}
    public function setID_Depto_Padre($dpto_padre) {return $this->ID_Depto_Padre = $dpto_padre;}
    public function setVisibilidad_Usuario($visible) {return $this->Visibilidad_Usuario =$visible;}
    public function setOrden($orden) {return $this->Orden =$orden;}
    public function setOperador_Default_ID($operadores_def) {return $this->Operador_Default_ID =$operadores_def;}
}
?>
