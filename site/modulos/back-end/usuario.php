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

$Empresas = $em->getRepository('Modelo\Empresa')->findAll();
$vm->assign('Empresas',$Empresas);

switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    if (!$permisos->verificarPermiso("usuarios_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=usuarios");
    } 
    
    $vm->display('usuario.tpl');
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("usuarios_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=usuarios");
    } else{
      $usuario = $em->getRepository('Modelo\Usuario')->find($_POST["usuarioId"][0]);
      $vm->assign('Usuario',$usuario);   
    }
    
    $vm->display('usuario.tpl');
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("usuarios_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=usuarios");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['usuarioId'] as $user) {
        $em->remove($em->getRepository('Modelo\Usuario')->find($user));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=usuarios");
    }
    break;
  case ("ver"):
    if (!$permisos->verificarPermiso("usuarios_actividad")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=usuarios");
      
    }
    else{
       
       $usuario = $em->getRepository('Modelo\Usuario')->find($_POST["usuarioId"][0]);
       $vm->assign('Usuario',$usuario);  
       $vm->display('actividadUsuario.tpl');
       
    }
    break;
   
}

