<?php
  namespace Modelo;
/**
 * @Entity @Table(name="Configuracion_Global")
 **/
class Configuracion_Global {
    /** 
      * @Id @Column(type="string") @GeneratedValue 
      * @var string
      */
    protected $Nombre;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Valor;
    
   
    public function getNombre(){return $this->Nombre;}
    public function getValor(){return $this->Valor;}
    
    public function setValor($valor){$this->Valor = $valor;}
   
}

?>
