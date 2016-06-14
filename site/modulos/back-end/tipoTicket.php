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
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);
                  
$EstadosApertura = $em->getRepository('Modelo\TicketEstado')->findByEstadofinal(0);
$vm->assign('TicketEstadosApertura',$EstadosApertura);
$EstadosCierre = $em->getRepository('Modelo\TicketEstado')->findByEstadofinal(1);
$vm->assign('TicketEstadosCierre',$EstadosCierre);

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("tipoTicket_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tipoTickets");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("tipoTicket_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tipoTickets");
    } else{
      $TicketTipo = $em->getRepository('Modelo\TicketTipo')->find($_POST["tipoTicketId"][0]);
      $vm->assign('TicketTipo',$TicketTipo);
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("tipoTicket_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tipoTickets");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['tipoTicketId'] as $TicketTipo) {
        $em->remove($em->getRepository('Modelo\TicketTipo')->find($TicketTipo));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=tipoTickets");
    }
    break;
   default:
     die;
    header("location:/operador.php?modulo=tipoTickets");
    break;
}

  $vm->display('tipoTicket.tpl');