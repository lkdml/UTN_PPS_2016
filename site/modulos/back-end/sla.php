<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\CustomField as CustomField;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\Sla as Sla;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos = $app->getPermisos();

$Slas = $em->getRepository('Modelo\Sla')->findAll();
$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
$Templates = $em->getRepository('Modelo\EmailTemplates')->findAll();
$Operadores = $em->getRepository('Modelo\Operador')->findAll(); //TODO aca hay usuarios/operadores eliminados o no activos
$TipoTickets = $em->getRepository('Modelo\TicketTipo')->findAll();

if (isset($_POST['condicion'])){
    $condicionID = $_POST['condicion'];
    $Condicion = $em->getRepository('Modelo\SlaCondicion')->find($condicionID);
    $elemento =  CustomField::createFromJson($Condicion->getCustomFieldsType());
    switch ($condicionID) {
      case '1': //Asignado A
      case '13': //Asignar a
        foreach ($Operadores as $operador) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$operador->getOperadorId()),"texto"=>$operador->getNombre().", ".$operador->getNombre()));
        }
        break;
      case '2': //Origen del ticket
        // code...
        break;
      case '3': //Departamento
      case '16': //Cambiar Departamento
        foreach ($Departamentos as $departamento) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$departamento->getDepartamentoId()),"texto"=>$departamento->getNombre()));
        }
        break;
      case '4': //Estado
      case '19': //Cambiar Estado
        foreach ($Estados as $estado) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$estado->getEstadoId()),"texto"=>$estado->getNombre()));
        }
        break;
      case '5': //Prioridad
      case '17': //Cambiar Prioridad
        foreach ($Prioridades as $prioridad) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$prioridad->getPrioridadId()),"texto"=>$prioridad->getNombre()));
        }
        break;
      case '6': //Tipo de Ticket
      case '18': //Cambiar Tipo de Ticket
        foreach ($TipoTickets as $tipoTicket) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$tipoTicket->getTipoTicketId()),"texto"=>$tipoTicket->getNombre()));
        }
        break;
      case '7': //El mensaje contiene
        // code...
        break;
      case '8': //El asunto contiene
        // code...
        break;
      case '9': //Mail de usuario
        // code...
        break;
      case '10': //Empresa
        // code...
        break;
      case '11': //Y
        // code...
        break;
      case '12': //O
        // code...
        break;

      case '14': //Agregar Nota
        // code...
        break;
      case '15': //Agregar Respuesta
        // code...
        break;
      case '20': //Enviar Mail a usuario (templates custom)
      case '21': //Enviar Mail a operador (templates custom)
        foreach ($Templates as $template) {
          $elemento->addOpciones(array("atributos"=>array("value"=>$template->getEmailId()),"texto"=>$template->getNombre()));
        }
        break;

      
      default:
        // code...
        break;
    }
    
    json_encode($elemento->crearElementoHTML());die;
    
    
} else if (isset($_GET['datosAjax'])){
  if($_GET['datosAjax']=='elementoHTML'){
    CustomField::createFromJson(urldecode($_GET['elementoHTML']))->crearElementoHTML();
  } else {
      $Usuarios = $em->getRepository('Modelo\Usuario')->findAll();  //TODO aca hay usuarios/operadores eliminados o no activos
      $Condiciones = $em->getRepository('Modelo\SlaCondicion')->findAll();
      $Parametros =  $em->getRepository('Modelo\SlaParametro')->findAll();
      $Empresas =  $em->getRepository('Modelo\Empresa')->findAll();
      $datos = array();
      foreach ($Departamentos as $departamento) {
        $datos['departamentos'][] = array($departamento->getDepartamentoId()=>array(
                                      "nombre"=>$departamento->getNombre(),
                                      "descripcion"=>$departamento->getDescripcion()
                                      ));
      }
      foreach ($Estados as $estado) {
        $datos['estados'][] = array($estado->getEstadoId()=>array(
                                      "nombre"=>$estado->getNombre(),
                                      "descripcion"=>$estado->getDescripcion(),
                                      "color"=>$estado->getColor(),
                                      "icono"=>$estado->getIcono(),
                                      "visibleFront"=>$estado->getVisibleFront()
                                      ));
      }
      foreach ($Prioridades as $prioridad) {
        $datos['prioridades'][] = array($prioridad->getPrioridadId()=>array(
                                      "nombre"=>$prioridad->getNombre(),
                                      "descripcion"=>$prioridad->getDescripcion(),
                                      "color"=>$estado->getColor()
                                      ));
      }
      foreach ($Templates as $template) {
        $datos['templates'][] = array($template->getEmailId()=>array(
                                      "nombre"=>$template->getNombre(),
                                      "asunto"=>$template->getAsunto(),
                                      "descripcion"=>$template->getTexto(),
                                      "tipo"=>$template->getTipo()
                                      ));
      }
      foreach ($Operadores as $operador) {
        $datos['operadores'][] = array($operador->getOperadorId()=>array(
                                      "nombre"=>$operador->getNombre(),
                                      "apellido"=>$operador->getApellido(),
                                      "email"=>$operador->getEmail()
                                      ));
      } 
      foreach ($TipoTickets as $tTicket) {
        $datos['tipoTickets'][] = array($tTicket->getTipoTicketId()=>array(
                                      "nombre"=>$tTicket->getNombre(),
                                      "descripcion"=>$tTicket->getDescripcion(),
                                      "icono"=>$estado->getIcono()
                                      ));
      } 
      foreach ($Usuarios as $usuario) {
        $datos['usuarios'][] = array($usuario->getUsuarioId()=>array(
                                      "nombre"=>$usuario->getNombre(),
                                      "apellido"=>$usuario->getApellido(),
                                      "email"=>$usuario->getEmail(),
                                      "fotoHash"=>$usuario->getFotoHash()                                     ));
      }
      foreach ($Condiciones as $condicion) {
        unset($paramCondicion);
        foreach ($condicion->getSlaParametro() as $param){
          $paramCondicion[] = array($param->getSlaParametroId()=>array(
                                      "descripcion"=>$param->getDescripcion()
                                      ));
        }
        $datos['condiciones'][] = array($condicion->getSlaCondicionId()=>array(
                                      "nombre"=>$condicion->getNombre(),
                                      "descripcion"=>$condicion->getDescripcion(),
                                      "tipo"=>$condicion->getTipo(),
                                      "customFieldsType"=>$condicion->getCustomFieldsType(),
                                      "slaParametro"=>$paramCondicion
                                      ));
      }
      foreach ($Parametros as $parametro) {
        $datos['parametros'][] = array($parametro->getSlaParametroId()=>array(
                                      "descripcion"=>$parametro->getDescripcion()
                                      ));
      }
      foreach ($Empresas as $empresa) {
        $datos['empresas'][] = array($empresa->getEmpresaId()=>array(
                                      "razonSocial"=>$empresa->getRazonSocial()
                                      ));
      }
        
        die(json_encode($datos));
  }
} else {

  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
  $vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
  $vm->assign('OperadorLogueado',$app->getOperador());
  $vm->assign('Permisos',$permisos);
  

  $vm->assign('Slas',$Slas);
  $vm->assign('Departamentos',$Departamentos);
  $vm->assign('Estados',$Estados);
  $vm->assign('Prioridades',$Prioridades);
  $vm->assign('Templates',$Templates);
  $vm->assign('Operadores',$Operadores);
  $vm->assign('TipoTickets',$TipoTickets);
  
  switch(strtolower($_POST["accion"])){
    case ("nuevo"):default:
      if (!$permisos->verificarPermiso("sla_crear")){
        $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
        $app->setError($error);
        $app->guardarErrorEnSession();
        $permisos->redirigir("/operador.php?modulo=slas");
      } 
      break;
    case ("editar"):
      if (!$permisos->verificarPermiso("sla_ver")){
        $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
        $app->setError($error);
        $app->guardarErrorEnSession();
        $permisos->redirigir("/operador.php?modulo=slas");
      } else{
        var_dump($_POST["slaId"][0]);
        $sla = $em->getRepository('Modelo\Sla')->find($_POST["slaId"][0]);
        $slaSlasCondiciones = $em->getRepository('Modelo\SlaSlasCondiciones')->findBy(array("sla"=>$_POST["slaId"][0]));
       
        foreach ($slaSlasCondiciones as $value) {
          $condiciones = cargarArrayHtmlCondiciones($value,$em);
        }
        $vm->assign('Sla',$sla);
        $vm->assign('pre',$condiciones['pre']);
        $vm->assign('vencimiento',$condiciones['vence']);
        $vm->assign('post',$condiciones['post']); 
      }
      break;
    case ("borrar"):
      if (!$permisos->verificarPermiso("sla_eliminar")){
        $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
        $app->setError($error);
        $app->guardarErrorEnSession();
        $permisos->redirigir("/operador.php?modulo=slas");
      } else{
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        
        foreach ($_POST['slaId'] as $sla) {
          $SlaUpdatear =  $em->getRepository('Modelo\Sla')->find($sla);
          $SlaUpdatear->setEliminado(true);
          $SlaUpdatear->setEstado(0);
          $em->persist($SlaUpdatear);
        }
        $em->flush();
        
        header("location:/operador.php?modulo=slas");
      }
      break;
     
  }
  
  
  
  $vm->display('sla.tpl');
}

function cargarArrayHtmlCondiciones(SlaSlasCondiciones $condiciones, $em){
  $arrayCondiciones = array();
  $idCondicion = (int)$condiciones->getSlaCondicion()->getSlaCondicionId();
  var_dump($condiciones->getSlaCondicion());
  $condicion = $em->getRepository('Modelo\SlaCondicion')->find($idCondicion);
  //$parametro = $em->getRepository('Modelo\SlaSlasCondiciones')->findBy(array("sla"=>$_POST["slaId"][0]));
  var_dump($condicion);
  
  
  
  die;
  return $arrayCondiciones;
}