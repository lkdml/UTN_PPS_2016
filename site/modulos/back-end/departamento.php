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
                  
$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$vm->assign('Departamentos',$Departamentos);

$Operadores = $em->getRepository('Modelo\Operador')->findAll();
$vm->assign('Operadores',$Operadores);
    
$OperadoresPorHabilitar = $em->getRepository('Modelo\Operador')->findAll();

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $departamento = $em->getRepository('Modelo\Departamento')->find($_POST["departamentoId"][0]);
    $vm->assign('Departamento',$departamento);   

     $operadoresAsignados=$departamento->getOperador();
    $vm->assign('OperadoresAsignados',$operadoresAsignados);   

    
    $OperadoresHabilitados=$departamento->getOperador();
    foreach ( $OperadoresPorHabilitar as $operadorhab){
      foreach ($operadoresAsignados as $kop=>$operador){
        if ($operadorhab == $operador){
          unset($OperadoresPorHabilitar[$kop]);
        }
      }
    }
    

    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['departamentoId'] as $departamento) {
      $em->remove($em->getRepository('Modelo\Departamento')->find($departamento));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=departamentos");
    break;
   default:
     die;
    header("location:/operador.php?modulo=departamentos");
    break;
}
$vm->assign('OperadoresPorHabilitar',$OperadoresPorHabilitar);
$vm->display('departamento.tpl');