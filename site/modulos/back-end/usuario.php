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

$Empresas = $em->getRepository('Modelo\Empresa')->findAll();
$vm->assign('Empresas',$Empresas);

switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $usuario = $em->getRepository('Modelo\Usuario')->find($_POST["usuarioId"][0]);
    $vm->assign('Usuario',$usuario);   

    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['usuarioId'] as $user) {
      $em->remove($em->getRepository('Modelo\Usuario')->find($user));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=usuarios");
    break;
   
}

$vm->display('usuario.tpl');
