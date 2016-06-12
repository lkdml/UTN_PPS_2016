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

$Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
    $vm->assign('Prioridades',$Prioridades);                  


switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("prioridades_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=prioridades");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("prioridades_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=prioridades");
    } else{
      $Prioridad = $em->getRepository('Modelo\Prioridad')->find($_POST["prioridadId"][0]);
      $vm->assign('Prioridad',$Prioridad);
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("prioridades_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=prioridades");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['prioridadId'] as $prioridad) {
        $em->remove($em->getRepository('Modelo\Prioridad')->find($prioridad));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=prioridades");
    }
    break;
   default:
     die;
    header("location:/operador.php?modulo=prioridades");
    break;
}
  $vm->display('prioridad.tpl');