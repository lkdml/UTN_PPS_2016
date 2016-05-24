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

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $Empresa = $em->getRepository('Modelo\Empresa')->find($_POST["empresaId"][0]);
    $vm->assign('Empresa',$Empresa);
    
    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['empresaId'] as $empresa) {
      $em->remove($em->getRepository('Modelo\Empresa')->find($empresa));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=empresas");
    break;
   default:
     die;
    header("location:/operador.php?modulo=empresas");
    break;
}


$vm->display('empresa.tpl');