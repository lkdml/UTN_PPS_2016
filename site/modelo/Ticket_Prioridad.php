<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Ticket_Prioridad")
 **/
class Ticket_Prioridad {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Prioridad_ID;
    
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
     * @Column(type="string")
     * @var string
     */
    protected $Color;
    
    /**
     * @Column(type="integer")
     * @var int
     */
    protected $Orden;
    
    
    public function getPrioridad_ID(){return $this->Prioridad_ID;}
    public function getDescripcion(){return $this->Descripcion;}
    public function getColor(){return $this->Color;}
    public function getNombre(){return $this->Nombre;}
    public function getOrden(){return $this->Orden;}
    
    
    public function setDescripcion($descrip){$this->Descripcion = $descrip;}
    public function setColor($color){$this->Color =$color;}
    public function setNombre($nombre){$this->Nombre =$nombre;}
    public function setOrden($orden){$this->Orden =$orden;}
    

}

?>