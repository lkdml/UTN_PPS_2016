<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Ticket_Filtros")
 **/
class Ticket_Filtros {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Filtro_ID;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Nombre;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Departamentos;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Estados;
    
     /**
     * @Column(type="string")
     * @var string
     */
    protected $Prioridades;
    
    /**
     * @Column(type="boolean")
     * @var boolean
     */
    protected $Asignado_A_Mi;
    
     /**
     * @Column(type="string")
     * @var string
     */
    protected $Operadores;
    
    
    public function getFiltro_ID(){return $this->Filtro_ID;}
    public function getNombre(){return $this->Nombre;}
    public function getDepartamentos(){return $this->Departamentos;}
    public function getPrioridades(){return $this->Prioridades;}
    public function getEstados(){return $this->Estados;}
    public function getAsignado_A_Mi(){return $this->Asignado_A_Mi;}
    public function getOperadores(){return $this->Operadores;}
    
    
    public function setNombre($nombre){$this->Nombre = $nombre;}
    public function setDepartamentos($departamentos){$this->Departamentos =$departamentos;}
    public function setPrioridades($prioridades){$this->Prioridades =$prioridades;}
    public function setEstados($estados){$this->Estados =$estados;}
    public function setAsignado_A_Mi($asignado){$this->Asignado_A_Mi =$asignado;}
    public function setOperadores($operadores){$this->Operadores =$operadores;}
    

}

?>
