<?php
namespace CORE\Controlador;
use \CORE\Controlador\Entity_Buffer as Entity_Buffer;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
abstract class SlaCondicion {
  private $SlaCondicion;
  
  public function getSlaCondicion(){return $this->SlaCondicion;  }
  public function setSlaCondicion($SlaCondicion){ $this->SlaCondicion = $SlaCondicion;}
  
  abstract public function toJson();
  abstract public function obtenerArrayDeElementosHTML();
  public function getTipo(){
    return get_class($this);
  }
  
}  


?>