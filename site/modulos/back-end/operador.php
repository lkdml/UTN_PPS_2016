<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession($modoOP);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$depatamentos=$em->getRepository('Modelo\Departamento')->findAll();
$perfiles=$em->getRepository('Modelo\Perfil')->findAll();

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
  $vm->assign('Departamentos', $depatamentos);
  $vm->assign('Perfiles', $perfiles);
  $vm->display('operador.tpl');
