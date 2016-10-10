<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

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
    $Prioridades = $em->getRepository('Modelo\Prioridad')->findBy(array("visibleFront"=>1));
    $vm->assign('Prioridades',$Prioridades);
    $Estados = $em->getRepository('Modelo\TicketEstado')->findBy(array("visibleFront"=>1));
    $vm->assign('TicketEstados',$Estados);
    $vm->display('nuevoTicket.tpl');
    break;
  case ("ver"):
    $Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
    $vm->assign('Prioridades',$Prioridades);
    $Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
    $posiblesEstadosCierre=$em->getRepository('Modelo\TicketEstado')->findByEstadofinal('1');
    $vm->assign('TicketEstados',$Estados);
    if (!empty($_GET["ticket"])){
      $_SESSION['LastTicketID']=$_GET["ticket"];
      $ordenamiento_mensajes = $em->getRepository('Modelo\ConfiguracionGlobal')->find('ordenamiento_mensajes');
      $Ticket = $em->getRepository('Modelo\Ticket')->find($_GET["ticket"]);
      if(!empty($Ticket->getUsuario()))
      {
        if ($Ticket->getUsuario()->getUsuarioId()== $app->getUsuario()->getUsuarioId())
        {
            $Mensajes = $em->getRepository('Modelo\Mensaje')->findBy(array("ticket"=>$_GET["ticket"],"tipoMensaje"=>1),
                                                                array('fecha' => $ordenamiento_mensajes->getValor()));
            $vm->assign('Ticket',$Ticket); 
            $vm->assign('EstadosCierre',$posiblesEstadosCierre);
            $vm->assign('Mensajes',$Mensajes);
            $vm->display('vistaTicket.tpl');
        }
        else {
          header("location:/index.php?modulo=misTickets");
        }
      }
      else {
        header("location:/index.php?modulo=misTickets");
      }
    } else {
      header("location:/index.php?modulo=misTickets");
    }
    break;
  default:
      header("location:/index.php?modulo=misTickets");
    break;
}

?>

