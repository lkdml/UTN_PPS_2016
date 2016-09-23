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

  public function addOptions(){
    
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
            }else {
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
  
  public static function cargarSLACustomField($cond_ID, &$em, $valor=null){
  
    $Condicion = $em->getRepository('Modelo\SlaCondicion')->find($cond_ID);
    $elemento =  CustomField::createFromJson($Condicion->getCustomFieldsType());
    switch ($cond_ID) {
      case '1': //Asignado A
      case '13': //Asignar a
      $valor=json_decode($valor);
        $Operadores = $em->getRepository('Modelo\Operador')->findAll(); //TODO aca hay usuarios/operadores eliminados o no activos
        $elemento->clearOpciones();
        foreach ($Operadores as $operador) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($operador->getOperadorId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId(),"selected"=>null),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId()),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
          }
        }
        break;
      case '2': //Origen del ticket
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '3': //Departamento
      case '16': //Cambiar Departamento
        $valor=json_decode($valor);
        $Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
        $elemento->clearOpciones();
        foreach ($Departamentos as $departamento) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($departamento->getDepartamentoId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId(),"selected"=>null),"texto"=>$departamento->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId()),"texto"=>$departamento->getNombre()));
          }
        }
        break;
      case '4': //Estado
      case '19': //Cambiar Estado
        $valor=json_decode($valor);
        $Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
        $elemento->clearOpciones();
        foreach ($Estados as $estado) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($departamento->getDepartamentoId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId(),"selected"=>null),"texto"=>$departamento->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$estado->getEstadoId()),"texto"=>$estado->getNombre()));
          }
        }
        break;
      case '5': //Prioridad
      case '17': //Cambiar Prioridad
        $valor=json_decode($valor);
        $Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
        $elemento->clearOpciones();
        foreach ($Prioridades as $prioridad) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($prioridad->getPrioridadId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$prioridad->getPrioridadId(),"selected"=>null),"texto"=>$prioridad->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$prioridad->getPrioridadId()),"texto"=>$prioridad->getNombre()));
          }
        }
        break;
      case '6': //Tipo de Ticket
      case '18': //Cambiar Tipo de Ticket
        $valor=json_decode($valor);
        $TipoTickets = $em->getRepository('Modelo\TicketTipo')->findAll();
        $elemento->clearOpciones();
        foreach ($TipoTickets as $tipoTicket) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($tipoTicket->getTipoTicketId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$tipoTicket->getTipoTicketId(),"selected"=>null),"texto"=>$tipoTicket->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$tipoTicket->getTipoTicketId()),"texto"=>$tipoTicket->getNombre()));
          }
        }
        break;
      case '7': //El mensaje contiene
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '8': //El asunto contiene
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '9': //Mail de usuario
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '10': //Empresa
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '11': //Y
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '12': //O
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
  
      case '14': //Agregar Nota
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '15': //Agregar Respuesta
        $valor=json_decode($valor);
        if (!is_null($valor)) {
          $elemento->setTexto($valor[0]);
        }
        break;
      case '20': //Enviar Mail a usuario (templates custom)
      case '21': //Enviar Mail a operador (templates custom)
        $valor=json_decode($valor);
        $Templates = $em->getRepository('Modelo\EmailTemplates')->findAll();
        $elemento->clearOpciones();
        foreach ($Templates as $template) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $value) {
              if ($template->getEmailId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$template->getEmailId(),"selected"=>null),"texto"=>$template->getNombre()));
                $setear=false;
                break;
              } 
            }
          }
          if ($setear){
            $elemento->addOpciones(array("atributos"=>array("value"=>$template->getEmailId()),"texto"=>$template->getNombre()));
          }
        }
        break;
  
      
      default:
        // code...
        break;
    }
    return $elemento;
  }
  
  
}
?>