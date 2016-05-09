<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Ticket_Estado")
 **/
class Ticket_Estado {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Estado_ID;
    
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
     * @Column(type="boolean")
     * @var boolean
     */
    protected $AutoCierre;
    
    /**
     * @Column(type="integer")
     * @var int
     */
    protected $Orden;
    
    
    public function getEstado_ID(){return $this->Estado_ID;}
    public function getDescripcion(){return $this->Descripcion;}
    public function getColor(){return $this->Color;}
    public function getAutoCierre(){return $this->AutoCierre;}
    public function getOrden(){return $this->Orden;}
    
    
    public function setDescripcion($descrip){$this->Descripcion = $descrip;}
    public function setColor($color){$this->Color =$color;}
    public function setAutocierre($autocierre){$this->AutoCierre =$autocierre;}
    public function setOrden($orden){$this->Orden =$orden;}
    

}

?>
