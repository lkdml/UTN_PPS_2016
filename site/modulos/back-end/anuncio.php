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

$Anuncios = $em->getRepository('Modelo\Anuncio')->findAll();
    $vm->assign('Anuncios',$Anuncios);                  

$Categorias = $em->getRepository('Modelo\CategoriaAnuncios')->findAll();
    $vm->assign('Categorias',$Categorias);   
    
$EmpresasPorHabilitar = $em->getRepository('Modelo\Empresa')->findAll();
    $vm->assign('EmpresasPorHabilitar',$EmpresasPorHabilitar);

switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    if (!$permisos->verificarPermiso("anuncios_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=anuncios");
    }  
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("anuncios_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=anuncios");
    } else{
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
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("anuncios_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=anuncios");
    } else {
      $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['anuncioId'] as $anuncio) {
        $em->remove($em->getRepository('Modelo\Anuncio')->find($anuncio));
      }
      $em->flush();
    }      
      header("location:/operador.php?modulo=anuncios");

    break;

}

  $vm->display('anuncio.tpl');

