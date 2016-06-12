<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession($modoOP);
$app = Aplicacion::getInstancia();

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Front_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Front').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Front').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Front').'imagenes/');
if ($app->ifHayError()){
      $error =$app->recuperarErrorDeSession();
      $vm->assign('Error',$error);
}
$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$vm->assign('Departamentos',$Departamentos);
$TicketTipos = $em->getRepository('Modelo\TicketTipo')->findAll();
$vm->assign('TicketTipos',$TicketTipos);
$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$vm->assign('Estados',$Estados);


$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$criterio = array();
  
  if (isset($_GET['Departamentos'])){
      $deptos = explode (',',$_GET['Departamentos']);
      $criterio['departamento']= $deptos;
  }
  if (isset($_GET['Estados'])){
      $estados = explode(',',$_GET['Estados']);
      $criterio['estado'] = $estados;
  }
  if (isset($_GET['tipoTicket'])){
      $tTicket = explode(',',$_GET['tipoTicket']);
      $criterio['tipoTicket'] = $tTicket;
  }
  if (empty($criterio)){
      $ticket = $em->getRepository('Modelo\Ticket')->findAll();
  } else {
      $ticket = $em->getRepository('Modelo\Ticket')->findBy($criterio);
  }
  
  $vm->assign('Tickets',$ticket);

$vm->display('misTickets.tpl');
?>


