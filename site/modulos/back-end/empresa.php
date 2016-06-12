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

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("empresas_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=empresas");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("empresas_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=empresas");
    } else{
      $Empresa = $em->getRepository('Modelo\Empresa')->find($_POST["empresaId"][0]);
      $vm->assign('Empresa',$Empresa);
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("empresas_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=empresas");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['empresaId'] as $empresa) {
        $em->remove($em->getRepository('Modelo\Empresa')->find($empresa));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=empresas");
    }
    break;
   default:
     die;
    header("location:/operador.php?modulo=empresas");
    break;
}


$vm->display('empresa.tpl');