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

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$depatamentos=$em->getRepository('Modelo\Departamento')->findAll();
$perfiles=$em->getRepository('Modelo\Perfil')->findAll();

switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    if (!$permisos->verificarPermiso("operadores_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=operadores");
    } 
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("operadores_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=operadores");
    } else{
      $operador = $em->getRepository('Modelo\Operador')->find($_POST["operadorId"][0]);
      $DepartamentosHabilitados=$operador->getDepartamento();
      foreach ( $DepartamentosHabilitados as $dptoHabilitado){
        foreach ($depatamentos as $kdepto=>$depto){
          if ($dptoHabilitado == $depto){
            unset($depatamentos[$kdepto]);
          }
        }
      }
      $vm->assign('DepartamentosHabilitados',$DepartamentosHabilitados);
      $vm->assign('Operador', $operador);
    }  
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("operadores_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=operadores");
    } else{
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['operadorId'] as $operador) {
        $em->remove($em->getRepository('Modelo\Operador')->find($operador));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=operadores");
    }
    break;

}
$vm->assign('Departamentos', $depatamentos);
$vm->assign('Perfiles', $perfiles);
$vm->display('operador.tpl');
