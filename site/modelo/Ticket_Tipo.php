<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Ticket_Tipo")
 **/
class Ticket_Tipo {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Tipo_Ticket_ID;
    
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
    
    
    public function getTipo_Ticket_ID(){return $this->Tipo_Ticket_ID;}
    public function getDescripcion(){return $this->Descripcion;}
    public function getNombre(){return $this->Nombre;}
  

    public function setDescripcion($descrip){$this->Descripcion = $descrip;}
    public function setNombre($nombre){$this->Nombre =$nombre;}
    
}

?>