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
                    
$Categorias = $em->getRepository('Modelo\CategoriaAnuncios')->findAll();
    $vm->assign('Categorias',$Categorias);                  


switch(strtolower($_POST["accion"])){
  case ("nuevo"):
    if (!$permisos->verificarPermiso("categorias_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=categorias");
    }
    break;
  case ("editar"):
    if (!$permisos->verificarPermiso("categorias_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=categorias");
    } else{
      $Categoria = $em->getRepository('Modelo\CategoriaAnuncios')->find($_POST["categoriaId"][0]);
      $vm->assign('Categoria',$Categoria);
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("categorias_eliminar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=categorias");
    } else{
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
      foreach ($_POST['categoriaId'] as $categoria) {
        $em->remove($em->getRepository('Modelo\CategoriaAnuncios')->find($categoria));
      }
      $em->flush();
      
      header("location:/operador.php?modulo=categorias");
    }
    break;
   default:
     die;
    header("location:/operador.php?modulo=categorias");
    break;
}
  $vm->display('categoria.tpl');