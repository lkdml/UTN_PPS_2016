<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);

$Slas = $em->getRepository('Modelo\Sla')->findAll();
$vm->assign('Slas',$Slas);

$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$vm->assign('Departamentos',$Departamentos);

$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$vm->assign('Estados',$Estados);

$Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
$vm->assign('Prioridades',$Prioridades);

$Templates = $em->getRepository('Modelo\EmailTemplates')->findAll();
$vm->assign('Templates',$Templates);
    
$Operadores = $em->getRepository('Modelo\Operador')->findAll();
$vm->assign('Operadores',$Operadores);

$TipoTickets = $em->getRepository('Modelo\TicketTipo')->findAll();
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
      $sla = $em->getRepository('Modelo\Sla')->find($_POST["slaId"][0]);
      $vm->assign('Sla',$sla);   
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