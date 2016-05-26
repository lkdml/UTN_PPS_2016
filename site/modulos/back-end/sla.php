<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
                  
$vm->assign('OperadorLogueado',$app->getOperador());

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
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $sla = $em->getRepository('Modelo\Sla')->find($_POST["slaId"][0]);
    $vm->assign('Sla',$sla);   

    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    
    foreach ($_POST['slaId'] as $sla) {
      $SlaUpdatear =  $em->getRepository('Modelo\Sla')->find($sla);
      $SlaUpdatear->setEliminado(true);
      $SlaUpdatear->setEstado(0);
      $em->persist($SlaUpdatear);
    }
    $em->flush();
    
    header("location:/operador.php?modulo=slas");
    break;
   
}




$vm->display('sla.tpl');