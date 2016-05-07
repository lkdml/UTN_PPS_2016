<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Email_Templates")
 **/
class Email_Templates {
    /** 
      * @Id @Column(type="integer") @GeneratedValue 
      * @var int
      */
    protected $Email_ID;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Tipo;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Nombre;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Texto;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Asunto;
    
    
    public function getEmail_ID(){return $this->Email_ID;}
    public function getTipo(){return $this->Tipo;}
    public function getNombre(){return $this->Nombre;}
    public function getTexto(){return $this->Texto;}
    public function getAsunto(){return $this->Asunto;}

    public function setTipo($tipo){$this->Tipo = $tipo;}
    public function setNombre($nombre){$this->Nombre =$nombre;}
    public function setTexto($texto){$this->Texto =$texto;}
    public function setAsunto($asunto){$this->Asunto =$asunto;}
    
}

?>