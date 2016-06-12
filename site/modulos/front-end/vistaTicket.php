<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Front_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Front').'css/',
                \CORE\Controlador\Config::getPublic('Ruta_Front').'js/',
                \CORE\Controlador\Config::getPublic('Ruta_Front').'imagenes/');
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('UsuarioLogueado',$app->getUsuario());
                  
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

switch(strtolower($_GET["accion"])){
  case ("nuevo"):
   $vm->display('nuevoTicket.tpl');
    break;
  case ("ver"):
    if (!empty($_GET["ticket"])){
      $_SESSION['LastTicketID']=$_GET["ticket"];
      $ordenamiento_mensajes = $em->getRepository('Modelo\ConfiguracionGlobal')->find('ordenamiento_mensajes');
      $Ticket = $em->getRepository('Modelo\Ticket')->find($_GET["ticket"]);
      $Mensajes = $em->getRepository('Modelo\Mensaje')->findBy(array("ticket"=>$_GET["ticket"]),
                                                              array('fecha' => $ordenamiento_mensajes->getValor()));
      $vm->assign('Ticket',$Ticket); 
      $vm->assign('Mensajes',$Mensajes);
      $vm->display('vistaTicket.tpl');
    } else {
      header("location:/index.php?modulo=misTickets");
    }
    break;
  default:
      header("location:/index.php?modulo=misTickets");
    break;
}

?>

