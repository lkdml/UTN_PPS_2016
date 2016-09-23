<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);
                    
                    
$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
    $vm->assign('Estados',$Estados);                  


switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("estados_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=estados");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("estados_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=estados");
    } else{
      $Estado = $em->getRepository('Modelo\TicketEstado')->find($_POST["estadoId"][0]);
      $vm->assign('Estado',$Estado);
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("estados_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=estados");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['estadoId'] as $estado) {
        $em->remove($em->getRepository('Modelo\TicketEstado')->find($estado));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=estados");
    }
    break;
   default:
     die;
    header("location:/operador.php?modulo=estados");
    break;
}

  $vm->display('estado.tpl');