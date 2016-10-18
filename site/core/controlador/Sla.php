<?php
namespace CORE\Controlador;
use \CORE\Controlador\Entity_Repository as Entity_Repository;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\Sla as ModeloSla;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  * 
  */
  
class Sla {
    private $modeloSla;
    private $modeloSlaCondiciones;
    private $modeloSlaSlasCondiciones;
    private $vm;
    private $er;
    private $em;
    
    public function getModeloSla(){return $this->modeloSla;}
    public function getModeloSlaCondiciones(){return $this->modeloSlaCondiciones;}
    public function getModeloSlaSlasCondiciones() {return $this->modeloSlaSlasCondiciones;}
    
    public function setModeloSla($modeloSla){ $this->modeloSla = $modeloSla;}
    public function setModeloSlaCondiciones($modeloSlaCondiciones){ $this->modeloSlaCondiciones = $modeloSlaCondiciones;}
    public function setModeloSlaSlasCondiciones($modeloSlaSlasCondiciones){ $this->modeloSlaSlasCondiciones = $modeloSlaSlasCondiciones;}
    public function setModeloSlaFromSlaId($idSla){
        $this->modeloSla = $this->er->findById($idSla,'Modelo\Sla');
        $this->modeloSlaSlasCondiciones = $this->er->findBy(array("sla"=>$idSla),'Modelo\SlaSlasCondiciones');

    }
    public function setVm($vm){$this->vm = $vm;}
    
    public function __construct(){
        $this->modeloSlaCondiciones = array();
        $this->er = Entity_Repository::getInstancia();
        $this->em = Entity_Manager::getInstancia()->getEntityManager();
    }
    
    public function persistirSLAConPOST($idSlaExistente=null,$nombre,$descripcion,$estado,$arrayPre,$arrayPreParam,$arrayPreValor,$arrayVence,$arrayVenceParam,$arrayVenceValor,$arrayPost,$arrayPostParam,$arrayPostValor){
      if(is_null($idSlaExistente)){
        //es un SLA nuevo
        $this->modeloSla = new ModeloSla();
        $this->setearSlaConDatos($nombre,$descripcion,isset($estado));
        $this->procesarPostSLA($arrayPre,$arrayPreParam,$arrayPreValor,$arrayVence,$arrayVenceParam,$arrayVenceValor,$arrayPost,$arrayPostParam,$arrayPostValor);
        $this->em->persist($this->modeloSla);
        foreach ($this->modeloSlaSlasCondiciones as $condicionSLA) {
            $this->em->persist($condicionSLA);
        }
        $this->em->flush();
        
      } else {
        //es un SLA existente
      }
      
    }
    
    private function setearSlaConDatos($nombre,$descripcion,$boolean){
        $this->modeloSla->setNombre($nombre);
        $this->modeloSla->setDescripcion($descripcion); 
         if ($boolean)
        {
            $this->modeloSla->setEstado(1);
        } else {
            $this->modeloSla->setEstado(0);
        }
    }
    
    private function setearSlaSlasCondiciones($idCondicion,$idParametro,$valor){
        if (isset($this->modeloSla)){
            $SlaSlaCondicion = new SlaSlasCondiciones();
            $SlaSlaCondicion->setSla($this->getModeloSla());
            $SlaSlaCondicion->setSlaCondicion($this->em->getRepository('Modelo\SlaCondicion')->find($idCondicion));
            $SlaSlaCondicion->setSlaParametro($this->em->getRepository('Modelo\SlaParametro')->find($idParametro));
            $SlaSlaCondicion->setValor(json_encode($valor));
            if(!isset($this->modeloSlaSlasCondiciones)){
              $this->modeloSlaSlasCondiciones =  array();
            }
            array_push($this->modeloSlaSlasCondiciones,$SlaSlaCondicion);
        } else {
            throw new Exception("Core\SLA: No se encuentra SLA");
        }
    }
    
     private function procesarPostSLA($arrayPre,$arrayPreParam,$arrayPreValor,$arrayVence,$arrayVenceParam,$arrayVenceValor,$arrayPost,$arrayPostParam,$arrayPostValor){
         $arraySlaSlasCondiciones = array();
          foreach ($arrayPre as $key=>$precondId) {
             if ($precondId != '-1') {
                 $SlaCondicion =  $this->em->getRepository('Modelo\SlaCondicion')->find($arrayPre[$key]);
                 $SlaParametro =  $this->em->getRepository('Modelo\SlaParametro')->find($arrayPreParam[$key]);
                 $valor = json_encode($arrayPreValor[$key]);
                 $this->setearSlaSlasCondiciones($SlaCondicion,$SlaParametro,$valor);
             }
          }
          foreach ($arrayVence as $key=>$venceCond) {
             if ($venceCond != '-1') {
                 $SlaCondicion =  $this->em->getRepository('Modelo\SlaCondicion')->find($arrayVence[$key]);
                 $SlaParametro =  $this->em->getRepository('Modelo\SlaParametro')->find($arrayVenceParam[$key]);
                 $valor = json_encode($arrayVenceValor[$key]);
                 $this->setearSlaSlasCondiciones($SlaCondicion,$SlaParametro,$valor);
             }
          }
          foreach ($arrayPost as $key=>$postCond) {
             if ($postCond != '-1') {
                  $SlaCondicion =  $this->em->getRepository('Modelo\SlaCondicion')->find($arrayPost[$key]);
                  $SlaParametro =  $this->em->getRepository('Modelo\SlaParametro')->find($arrayPostParam[$key]);;
                  $valor = json_encode($arrayPostValor[$key]);
                  $this->setearSlaSlasCondiciones($SlaCondicion,$SlaParametro,$valor);   
             }
          }
          return true;
      }
    
    public function persistir(){
        $em = Entity_Manager::getInstancia()->getEntityManager();
        var_dump(empty($this->modeloSla->getSlaId()));die;
        if (empty($this->modeloSla->getSlaId())){
          $em->persist($this->modeloSla);
          foreach ($this->modeloSlaCondiciones as $condicionSLA) {
              $em->persist($condicionSLA);
          }
          $em->flush();
        } else {
          //TODO: probar si funciona lo anterior
          var_dump($this);die;
        }
    }
  
  /**
  * @descripcion devuelve un string HTML con el elemento Parametro y los datos guardados
  * @param $idIteracion (int) id utilizado para el numero del renglon o elemento HTML
  * @param $tipo (string) utilizado para filtrar el tipo de condición requerida
  * @param $cond_id (int) id de la condición utilizada en el elemento html
  * @param $seleccion (int) el id del campo selected
  * 
  * @return (string) Codigo HTML
  */  
  private function tplFragmentCondicion($idIteracionP,$tipo,$slaSlasCondiciones=null){ //FIX esto es Vista
      $Condiciones = $this->er->findAll('Modelo\SlaCondicion');
      $CondicionesDelTipo = array();
      foreach ($Condiciones as $cond) {
        if ($cond->getTipo() == $tipo) {
          array_push($CondicionesDelTipo,$cond);
        }
      }
      $this->vm->assign('tipoCond',$tipo);
      $this->vm->assign('idIteracion',$idIteracionP);
      $this->vm->assign('slaCondiciones',$CondicionesDelTipo);
      $this->vm->assign('slaCondicionesEleccion',$slaSlasCondiciones);
      $tpl = $this->vm->fetch('slaFragmentCondicion.tpl');
      return $tpl;
  }
  
  /**
   * @descripcion devuelve un string HTML con el elemento Parametro y los datos guardados
   * @param $idIteracion (int) id utilizado para el numero del renglon o elemento HTML
   * @param $tipo (string) utilizado para filtrar el tipo de condición requerida
   * @param $cond_id (int) id de la condición utilizada en el elemento html
   * @param $seleccion (int) el id del campo selected
   * 
   * @return (string) Codigo HTML
   */
  private function tplFragmentParametro($idIteracion,$tipo,$condicion=null,$slaSlasCondiciones=null){
    if (is_null($condicion)) {
      $this->vm->assign('tipoCond',$tipo);
      $this->vm->assign('idIteracion',$idIteracion);
      $this->vm->assign('parametros',null);
      $this->vm->assign('slaParametrosEleccion',$slaSlasCondiciones);
      
    } else {
      if (is_string($condicion)){
        $condicion = $this->er->findById($condicion,'Modelo\SlaCondicion');
      }
      $Parametros = $condicion->getSlaParametro();
      $this->vm->assign('tipoCond',$tipo);
      $this->vm->assign('idIteracion',$idIteracion);
      $this->vm->assign('parametros',$Parametros);
      $this->vm->assign('slaParametrosEleccion',$slaSlasCondiciones);
      
    }
    $tpl = $this->vm->fetch('slaFragmentParametro.tpl');
    return $tpl;
  }
  
  /**
   * @descripcion devuelve un string HTML con el elemento Valor y los datos guardados
   * @param $idIteracion (int) id utilizado para el numero del renglon o elemento HTML
   * @param $tipo (string) utilizado para filtrar el tipo de condición requerida
   * @param $cond_id (int) id de la condición utilizada en el elemento html
   * @param $valores (string o array) el valor del campo o el array con los id seleccionados de un select
   * 
   * @return (string) Codigo HTML
   */
  private function tplFragmentValor($idIteracion,$tipo,$condicion=null,$Valores=null){
    if (is_null($condicion)) {
      $this->vm->assign('tipoCond',$tipo);
      $this->vm->assign('idIteracion',$idIteracion);
    } else {
      if (is_string($condicion)){
        $condicion = $this->er->findById($condicion,'Modelo\SlaCondicion');
      }
      $valores = $this->cargarSLACustomField($condicion,$Valores);
      $this->vm->assign('valores',$valores->elementoHTMLToString());
      $this->vm->assign('tipoCond',$tipo);
      $this->vm->assign('idIteracion',$idIteracion);
    } 
    $tpl = $this->vm->fetch('slaFragmentValor.tpl');
    return $tpl;
  }
  
  /**
   * @descripcion Funcion para cargar un renglon completo de condiciones (cond, param y valor). 
   * @param $tipo = Tipo de condición 'pre','post','vence'
   * @param $tieneDatos boolean para saber si toma los datos de SlaCondicion o SlaSlasCondiciones
   * 
   * @return string Codigo HTML
   */
  public function tplTodoFromCondicionesExitentesDelTipo($tipo, $tieneDatos=false,$iteracion=null,$cond_id=null){
    if ($iteracion == null){
      $iteracion=0;
    } 
    $renglon=array();
    if ($tieneDatos){
      foreach ($this->modeloSlaSlasCondiciones as $slaCond) {
        if ($slaCond->getSlaCondicion()->getTipo() == $tipo){
          $rta[$iteracion]  = $this->tplFragmentCondicion($iteracion,$tipo,$slaCond->getSlaCondicion()->getSlaCondicionId()).
                                $this->tplFragmentParametro($iteracion,$tipo,$slaCond->getSlaCondicion(),$slaCond->getSlaParametro()).
                                $this->tplFragmentValor($iteracion,$tipo,$slaCond->getSlaCondicion(),$slaCond->getValor());
                                $iteracion ++;
        }
        
      }
    } else {
      if(is_null($cond_id)){
        //$this->modeloSlaCondiciones = $this->er->findById($cond_id,'Modelo\SlaCondicion');
        $rta[$iteracion] = $this->tplFragmentCondicion($iteracion,$tipo).
                            $this->tplFragmentParametro($iteracion,$tipo).
                            $this->tplFragmentValor($iteracion,$tipo);
        $iteracion ++;
      } else {
        $this->modeloSlaCondiciones = $this->er->findById($cond_id,'Modelo\SlaCondicion');
          if ($this->modeloSlaCondiciones->getTipo() == $tipo){
            $rta[$iteracion] = $this->tplFragmentCondicion($iteracion,$tipo,$cond_id).
                                $this->tplFragmentParametro($iteracion,$tipo,$cond_id).
                                $this->tplFragmentValor($iteracion,$tipo,$cond_id);
                                $iteracion ++;
          }
      }
    }
    $this->vm->assign('tipoCond',$tipo);
    $this->vm->assign('renglonesHtml',$rta);
    $tpl = $this->vm->fetch('slaFragmentBoton.tpl');
    return $tpl;
  }
  
 
  public function cargarSLACustomField($cond, $valor=null){ //TODO Quitar de CF class
    $elemento = CustomField::createFromJson($cond->getCustomFieldsType());
    switch ($cond->getSlaCondicionId()) {
      case '1': //Asignado A
      case '13': //Asignar a
      $valor=json_decode($valor);
        $Operadores = $this->er->findAll('Modelo\Operador'); //TODO aca hay usuarios/operadores eliminados o no activos
        $elemento->clearOpciones();
        foreach ($Operadores as $operador) {
          $setear =true;
          
          if (!is_null($valor)) {            
            if (!is_array($valor)){
                if ($operador->getOperadorId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId(),"selected"=>null),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
                } 
            } else {
              foreach ($valor as $key=>$value) {
                if ($operador->getOperadorId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId(),"selected"=>null),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
                  break;
                } 
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
        $Departamentos = $this->er->findAll('Modelo\Departamento'); 
        $elemento->clearOpciones();
        foreach ($Departamentos as $departamento) {
          $setear =true;
          if (!is_null($valor)) {
            if (!is_array($valor)){
              if ($departamento->getDepartamentoId() == (int)$valor){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId(),"selected"=>null),"texto"=>$departamento->getNombre()));
                  $setear=false;
                } 
            } else {
              foreach ($valor as $value) {
                if ($departamento->getDepartamentoId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId(),"selected"=>null),"texto"=>$departamento->getNombre()));
                  $setear=false;
                  break;
                } 
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
        $Estados = $this->er->findAll('Modelo\TicketEstado'); 
        $elemento->clearOpciones();
        foreach ($Estados as $estado) {
          $setear =true;
          if (!is_null($valor)) {
            if (!is_array($valor)){
                if ($estado->getEstadoId() == (int)$valor){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$estado->getEstadoId(),"selected"=>null),"texto"=>$estado->getNombre()));
                  $setear=false;
                } 
            } else {
              foreach ($valor as $value) {
                if ($estado->getEstadoId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$estado->getEstadoId(),"selected"=>null),"texto"=>$estado->getNombre()));
                  $setear=false;
                  break;
                } 
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
        $Prioridades = $this->er->findAll('Modelo\Prioridad'); 
        $elemento->clearOpciones();
        foreach ($Prioridades as $prioridad) {
          $setear =true;
          if (!is_null($valor)) {
            if (!is_array($valor)){
                if ($prioridad->getPrioridadId() == (int)$valor){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$prioridad->getPrioridadId(),"selected"=>null),"texto"=>$prioridad->getNombre()));
                  $setear=false;
                }
            } else {
              foreach ($valor as $value) {
                if ($prioridad->getPrioridadId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$prioridad->getPrioridadId(),"selected"=>null),"texto"=>$prioridad->getNombre()));
                  $setear=false;
                  break;
                } 
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
        $TipoTickets = $this->er->findAll('Modelo\TicketTipo'); 
        $elemento->clearOpciones();
        foreach ($TipoTickets as $tipoTicket) {
          $setear =true;
          if (!is_null($valor)) {
            if (!is_array($valor)){
                if ($tipoTicket->getTipoTicketId() == (int)$valor){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$tipoTicket->getTipoTicketId(),"selected"=>null),"texto"=>$tipoTicket->getNombre()));
                  $setear=false;
                } 
            } else {
              foreach ($valor as $value) {
                if ($tipoTicket->getTipoTicketId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$tipoTicket->getTipoTicketId(),"selected"=>null),"texto"=>$tipoTicket->getNombre()));
                  $setear=false;
                  break;
                } 
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
          $elemento->addAtributos(array("value"=>$valor[0],"min"=>"0.0"));
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
        $Templates = $this->er->findAll('Modelo\EmailTemplates'); 
        $elemento->clearOpciones();
        foreach ($Templates as $template) {
          $setear =true;
          if (!is_null($valor)) {
            if (!is_array($valor)){
                if ($template->getEmailId() == (int)$valor){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$template->getEmailId(),"selected"=>null),"texto"=>$template->getNombre()));
                  $setear=false;
                } 
            } else {
              foreach ($valor as $value) {
                if ($template->getEmailId() == (int)$value){
                  $elemento->addOpciones(array("atributos"=>array("value"=>$template->getEmailId(),"selected"=>null),"texto"=>$template->getNombre()));
                  $setear=false;
                  break;
                } 
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