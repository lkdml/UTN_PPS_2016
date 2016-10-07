<?php
namespace CORE\Controlador;
use \CORE\Controlador\Entity_Buffer as Entity_Buffer;
use CORE\Controlador\CustomField as CustomField;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
abstract class SlaCondicion {
  private $SlaCondicion;
  private $condicion_CF;
  
  public function getSlaCondicion(){return $this->SlaCondicion;  }
  public function setSlaCondicion($SlaCondicion){ $this->SlaCondicion = $SlaCondicion;}
  
  abstract public function toJson(); 
  abstract public function obtenerArrayDeElementosHTML();
  public function getTipo(){
    return get_class($this);
  }
  
  private function cargarParametroCF($slaParametro){
    
  }
  public static function cargarSLACustomField($cond_ID, &$em, $valor=null){ //TODO Quitar de CF class
    $elemento = CustomField::createFromJson($this->SlaCondicion->getCustomFieldsType());
    switch ($cond_ID) {
      case '1': //Asignado A
      case '13': //Asignar a
      $valor=json_decode($valor);
        $Operadores = $em->getRepository('Modelo\Operador')->findAll(); //TODO aca hay usuarios/operadores eliminados o no activos
        $elemento->clearOpciones();
        foreach ($Operadores as $operador) {
          $setear =true;
          if (!is_null($valor)) {
            foreach ($valor as $key=>$value) {
              if ($operador->getOperadorId() == (int)$value){
                $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId(),"selected"=>null),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
                //$setear=false;
                break;
              } 
            }
            unset($valor[$key]); //elimino el resultado ya cargado
          } else {
            $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId()),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
          }
         // if ($setear){
          //  $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId()),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
          //}
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