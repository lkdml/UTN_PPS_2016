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
                  
$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$vm->assign('Departamentos',$Departamentos);

$TicketTipos = $em->getRepository('Modelo\TicketTipo')->findAll();
$vm->assign('TicketTipos',$TicketTipos);

$Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
$vm->assign('Prioridades',$Prioridades);

$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$vm->assign('TicketEstados',$Estados);

$SLAs = $em->getRepository('Modelo\Sla')->findAll();
$vm->assign('SLAs',$SLAs);

//TODO: los campos custom, deberán cargarse por ajax, al seleccionar el departamento o cambiarlo.
$CamposCustoms = $em->getRepository('Modelo\TicketCustomFields')->findAll();
$vm->assign('TicketCustomFields',$CamposCustoms);

// TODO: los operadores deberían cargarse por ajax al cambiar de departamento, asi permite seleccionar los que tiene visibilidad ese departamento.
$Operadores = $em->getRepository('Modelo\Operador')->findAll();
$vm->assign('Operadores',$Operadores);
    


switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $Ticket = $em->getRepository('Modelo\Ticket')->find($_POST["ticketId"][0]);
    $vm->assign('Ticket',$Ticket);   

    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['ticketId'] as $departamento) {
      $em->remove($em->getRepository('Modelo\Ticket')->find($departamento));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=tickets");
    break;
}
$vm->display('ticket.tpl');
