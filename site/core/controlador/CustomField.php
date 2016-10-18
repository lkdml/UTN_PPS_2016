<?php
namespace CORE\Controlador;
use \CORE\Controlador\CustomField as CustomField;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
  

class CustomField implements \JsonSerializable {
  private $elementoHTML;
  private $atributos;
  private $texto;
  private $opciones;
  
  public function getElementoHTML() { return $this->elementoHTML;}
  public function getAtributos(){ return $this->atributos;}
  public function getTexto() { return $this->texto;}
  public function getOpciones() { return $this->opciones;}
  
  public function setElementoHTM($elementoHTML) {$this->elementoHTML = $elementoHTML;}
  public function setAtributos($atributos) { $this->atributos = $atributos;}
  public function setTexto($texto) { $this->texto = $texto;}
  public function setOpciones($opciones) {$this->opciones = $opciones;}
  
  
  public function addOpciones(array $opcion)
  {
      $this->opciones[] = $opcion;
  }
  public function removeOpciones(array $opcion)
  {
      $this->opciones->removeElement($opcion);
  }
  public function clearOpciones()
  {
      $this->opciones = array();
  }
  
  public function addAtributos(array $opcion)
  {
      $this->atributos = array_merge($this->atributos,$opcion);
  }
  public function removeAtributos(array $opcion)
  {
      $this->atributos->removeElement($opcion);
  }
  public function clearAtributos()
  {
      $this->atributos = array();
  }

  
  /**
   * @author lkdml
   * @param $elementoHTML (input, textarea, select, img)
   * @param $atributos (todos los atributos dentro del tagHTML de apertura usando "nombreAtributoHTML como clave"=>"valor")
   * @param $texto (el texto entre tags)
   * @param $opciones (usado para select o datalist, array de las opciones con subclaves "atributos" y "texto")
   **/
  public function __construct($elementoHTML=null, array $atributos= array(), $texto=null, array $opciones=array()){
    $this->elementoHTML = $elementoHTML;
    $this->atributos = $atributos;
    $this->texto = $texto;
    $this->opciones = $opciones;
  }
  
  public function jsonSerialize() {
      return get_object_vars($this);
  }
  

/**
 * retorna una instancia de CustomField con los datos del json_encode de la misma clase
 * 
 * @param  json
 * @return \CORE\Controlador\CustomField
 */
public static function createFromJson($JsonCustomField)
{
    $std = json_decode($JsonCustomField);
    $instance = new static;
    $instance->setElementoHTM($std->elementoHTML);
    $instance->setAtributos((array)$std->atributos);
    $instance->setTexto($std->texto);
    $opciones = array();
    foreach ($std->opciones as $value) {
      $opciones[] = (array)$value;
    }
    $instance->setOpciones($opciones);
    return $instance;
}
  
  public function crearElementoHTML() {
    foreach ( $this->crearTagsHTML() as $key=>$value) {
      print_r($value['apertura']);
      if (array_key_exists("internos",$value)){
        foreach ($value['internos'] as $key=>$interno) {
          print_r($interno);
        }
      }
      print_r($value['cierre']);
    };
  }
  
  public function elementoHTMLToString(){
    $elemento = "";
    foreach ( $this->crearTagsHTML() as $key=>$value) {
      $elemento .= $value['apertura'];
      if (array_key_exists("internos",$value)){
        foreach ($value['internos'] as $key=>$interno) {
          $elemento .= $interno;
        }
      }
     $elemento .= $value['cierre'];
    }
    return $elemento;
  }
  
  /**
   * @author lkdml
   * @desc según el $elementoHTML, devuelve los tags que correspondan
   * @return Array("apertura"=>"valor","cierre"=>"valaor","internos[]" (para los datalist o select))
   **/
  private function crearTagsHTML(){
    $rta = array();
    if (!is_null($this->elementoHTML)){
      switch (strtolower($this->elementoHTML)){
        case "input":
        case "textarea":
            if(array_key_exists("list",$this->atributos)){
              $rta[] = array("apertura"=>"<$this->elementoHTML ".  $this->agregarAtributosHTML($this->atributos).">".$this->texto. "<datalist id='".$this->atributos["list"]."'>");
              $i=0;
              foreach ($this->opciones as $opcion) {
                $rta[]["internos"] = array($i =>"<option ". $this->agregarAtributosHTML((array)$opcion['atributos']).">");
                $i++;
              } 
              $rta[] = array("cierre"=>"</datalist></$this->elementoHTML>");
            }else if(in_array("number",$this->atributos)){
              $rta[] = array("apertura"=>"<$this->elementoHTML ".  $this->agregarAtributosHTML($this->atributos).">");
              $rta[] = array("cierre"=>"</$this->elementoHTML>");
            }else  {
              $rta[] = array("apertura"=>"<$this->elementoHTML ".  $this->agregarAtributosHTML($this->atributos).">".$this->texto);
              $rta[] = array("cierre"=>"</$this->elementoHTML>");
            }
          break;
        case "select":
            $rta[] = array("apertura"=>"<$this->elementoHTML ".  $this->agregarAtributosHTML($this->atributos).">".$this->texto);
            $i=0;
            foreach ($this->opciones as $opcion) {
              $rta[]["internos"] = array($i =>"<option ". $this->agregarAtributosHTML((array)$opcion['atributos']).">".$opcion["texto"]."</option>");
              $i++;
            }
            $rta[] = array("cierre"=>"</$this->elementoHTML>");
          break;
        case "img":
            $rta[] = array("apertura"=>"<"+$this->elementoHTML + $this->agregarAtributosHTML($this->atributos)+">"+$this->texto);
          break;
        default:
          break;
      }
      return $rta;
    }
  }
  
  private function agregarAtributosHTML(array $attr){
    $atributosDelElementoHTML = "";
    foreach ($attr as $clave=>$valor) {
      if(is_null($valor) || empty($valor)){
        $atributo = " ";
      } else {
        $atributo = "='$valor'";
      }
      $atributosDelElementoHTML = "$atributosDelElementoHTML $clave$atributo";
    }
    return $atributosDelElementoHTML;
  }
  
 
  
  
}
?>