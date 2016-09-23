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
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


if (isset($_POST['condicion'])){
    $condicionID = $_POST['condicion'];
    $campo = CustomField::cargarSLACustomField($condicionID, $em);
    json_encode($campo->crearElementoHTML());die;
    
    
} else {
  $Slas = $em->getRepository('Modelo\Sla')->findAll();
  $Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
  $Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
  $Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
  $Templates = $em->getRepository('Modelo\EmailTemplates')->findAll();
  $Operadores = $em->getRepository('Modelo\Operador')->findAll(); //TODO aca hay usuarios/operadores eliminados o no activos
  $TipoTickets = $em->getRepository('Modelo\TicketTipo')->findAll();
  
  if (isset($_GET['datosAjax'])){
  
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
          //var_dump($_POST["slaId"][0]);
          $Condiciones = $em->getRepository('Modelo\SlaCondicion')->findAll();
          $Parametros =  $em->getRepository('Modelo\SlaParametro')->findAll();
          $sla = $em->getRepository('Modelo\Sla')->find($_POST["slaId"][0]);
          $slaSlasCondiciones = $em->getRepository('Modelo\SlaSlasCondiciones')->findBy(array("sla"=>$_POST["slaId"][0]));
          $ConfSlaExistente = cargarSlaArray2TPL($Condiciones, $Parametros, $sla, $slaSlasCondiciones, $em);
          
          
          $slaValores = array();
          $slaValores = cargarArrayHtmlCondiciones($slaSlasCondiciones,$em);
          $vm->assign('slaCondiciones',$Condiciones);
          $vm->assign('slaParametros',$Parametros);
          //var_dump($Condiciones);die;
          $vm->assign('slaValores',$slaValores);
          $vm->assign('Sla',$sla);
          //$vm->assign('pre',$condiciones['pre']);
          //$vm->assign('vencimiento',$condiciones['vence']);
          //$vm->assign('post',$condiciones['post']); 
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
            $em->remove($em->getRepository('Modelo\Sla')->find($sla));
          }
          $em->flush();
          /*foreach ($_POST['slaId'] as $sla) {
            $SlaUpdatear =  $em->getRepository('Modelo\Sla')->find($sla);
            $SlaUpdatear->setEliminado(true);
            $SlaUpdatear->setEstado(0);
            $em->persist($SlaUpdatear);
          }
          $em->flush();*/
          
          header("location:/operador.php?modulo=slas");
        }
        break;
       
    }
    
    
    
    $vm->display('sla.tpl');
  }
}
function cargarSlaArray2TPL(&$Condiciones, &$Parametros, &$sla, &$slaSlasCondiciones, &$em){
  $retorno = array();
  foreach ($Condiciones as $condicion) {
    unset($paramCondicion);
    foreach ($condicion->getSlaParametro() as $param){
      $paramCondicion[] = array($param->getSlaParametroId()=>array(
                                  "descripcion"=>$param->getDescripcion()
                                  ));
    }
    $retorno['condiciones'][] = array($condicion->getSlaCondicionId()=>array(
                                  "nombre"=>$condicion->getNombre(),
                                  "descripcion"=>$condicion->getDescripcion(),
                                  "tipo"=>$condicion->getTipo(),
                                  "customFieldsType"=>$condicion->getCustomFieldsType(),
                                  "slaParametro"=>$paramCondicion
                                  ));
  }
  //echo "<pre>";
  //var_dump($Condiciones[0]->getSlaParametro());
  //echo "</pre>";die;
  //var_dump($Condiciones[0]->getSlaCondicionId());
  //var_dump($Parametros[0]);
  //die;
  
  return $retorno;
}


function cargarArrayHtmlCondiciones($condiciones, $em){
  $arrayCondiciones = array();
  $i = 0;
  foreach ($condiciones as $condicion) {
    $idCondicion = (int)$condicion->getSlaCondicion()->getSlaCondicionId();
    $valores = $condicion->getValor();
    $tipo = ($condicion->getSlaCondicion()->getTipo());
    $campo = CustomField::cargarSLACustomField($idCondicion, $em,$valores );
    $arrayCondiciones[$tipo][$i]['html'] = $campo->elementoHTMLToString();
    $arrayCondiciones[$tipo][$i]['parametroId'] = (int)$condicion->getSlaParametro()->getSlaParametroId();
    $arrayCondiciones[$tipo][$i]['condicionId'] = (int)$condicion->getSlaCondicion()->getSlaCondicionId();
  }
  //var_dump($arrayCondiciones);die;
  return $arrayCondiciones;
}

