<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');

use \Modelo\Perfil as Perfil;
use \Modelo\Rol as Rol;
/**
 * Valido que el operador esté con la session habilitadas
 */
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
    $perfil = $em->getRepository('Modelo\Perfil')->find($_POST["perfil"][0]);
    $vm->assign('Nombre', $perfil->getNombre());
    foreach ($perfil->getRoles() as $rol){
      $vm->assign($rol->getNombre(),true);
    }
    $vm->assign('perfil',$perfil->getId());
    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['perfil'] as $perfil) {
      $em->remove($em->getRepository('Modelo\Perfil')->find($perfil));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=perfiles");
    break;
   default:
    die;
    break;
  
  
  
}



  $vm->display('nuevoPerfil.tpl');