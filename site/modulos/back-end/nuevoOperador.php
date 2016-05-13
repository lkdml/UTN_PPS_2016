<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession($modoOP);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $operador = $em->getRepository('Modelo\Operador')->find($_POST["operadorId"][0]);
    $vm->assign('Operador', $operador);
    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['operadorId'] as $operador) {
      $em->remove($em->getRepository('Modelo\Operador')->find($operador));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=operadores");
    break;
   default:
     die;
    header("location:/operador.php?modulo=operadores");
    break;
}

  $vm->display('nuevoOperador.tpl');
