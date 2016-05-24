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

$Anuncios = $em->getRepository('Modelo\Anuncio')->findAll();
    $vm->assign('Anuncios',$Anuncios);                  

$Categorias = $em->getRepository('Modelo\CategoriaAnuncios')->findAll();
    $vm->assign('Categorias',$Categorias);   
    
$EmpresasPorHabilitar = $em->getRepository('Modelo\Empresa')->findAll();
    $vm->assign('EmpresasPorHabilitar',$EmpresasPorHabilitar);

switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    // Si el parametro que envio en accion es alta, solo debo validar permisos
    //var_dump($_POST);die;
   // $vm->assign('accion',$_POST["accion"]);
    break;
  case ("editar"):
    //TODO: falta validar permisos para esta accion.
    $Anuncio = $em->getRepository('Modelo\Anuncio')->find($_POST["anuncioId"][0]);
    $vm->assign('Anuncio',$Anuncio);
    
    
    $empresasAsignadas=$Anuncio->getEmpresa();
    $vm->assign('EmpresasAsignadas',$empresasAsignadas);   

    $EmpresasHabilitadas=$Anuncio->getEmpresa();
    foreach ( $EmpresasPorHabilitar as $empresahab){
      foreach ($empresasAsignadas as $kop=>$empresa){
        if ($empresahab == $empresa){
          unset($EmpresasPorHabilitar[$kop]);
        }
      }
    }
    
    break;
  case ("borrar"):
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['anuncioId'] as $estado) {
      $em->remove($em->getRepository('Modelo\Anuncio')->find($estado));
    }
    $em->flush();
    
    header("location:/operador.php?modulo=anuncios");
    break;
   default:
     die;
    header("location:/operador.php?modulo=anuncios");
    break;
}

  $vm->display('anuncio.tpl');