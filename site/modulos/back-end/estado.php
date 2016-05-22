<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession($modoOP);

  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
                    
                    
$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
    $vm->assign('Estados',$Estados);                  


switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $Estado = $em->getRepository('Modelo\TicketEstado')->find($_POST["estadoId"][0]);
    $vm->assign('Estado',$Estado);
    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['estadoId'] as $estado) {
      $em->remove($em->getRepository('Modelo\TicketEstado')->find($estado));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=estados");
    break;
   default:
     die;
    header("location:/operador.php?modulo=estados");
    break;
}

  $vm->display('estado.tpl');