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

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("perfiles_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=perfiles");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("perfiles_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=perfiles");
    } else{
      $perfil = $em->getRepository('Modelo\Perfil')->find($_POST["perfil"][0]);
      $vm->assign('Nombre', $perfil->getNombre());
      $vm->assign('Descripcion',$perfil->getDescripcion());
      foreach ($perfil->getRolNombre() as $rol){
        $vm->assign($rol->getNombre(),true);
      }
      $vm->assign('perfil',$perfil->getPerfilId());
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("perfiles_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=perfiles");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['perfil'] as $perfil) {
        $em->remove($em->getRepository('Modelo\Perfil')->find($perfil));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=perfiles");
    }
    break;
   default:
    header("location:/operador.php?modulo=perfiles");
    break;
}
$vm->display('perfil.tpl');