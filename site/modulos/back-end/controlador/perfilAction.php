<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');

use \Modelo\Perfil as Perfil;
use \Modelo\Rol as Rol;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
Aplicacion::startSession(true);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
if (isset($_GET['perfil'])){
    if (!$permisos->verificarPermiso("perfiles_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $getPerfil =  $em->getRepository('Modelo\Perfil')->find($_GET["perfil"]);
        $Perfil = setearPerfil($getPerfil,$em);
        $em->merge($Perfil);
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("perfiles_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
       $Perfil = setearPerfil(new Perfil(),$em);
       $em->persist($Perfil);
       $em->flush();
    }
}

function setearPerfil(Perfil $perfil,$em){
    $perfil->setNombre($_POST['Nombre']);
    $perfil->setDescripcion($_POST['Descripcion']);
    $perfil->setEstado(true);
    $perfil->getRolNombre()->clear();
    foreach ($_POST['permisos'] as $permiso=>$valor){
        $rol = $em->find('Modelo\Rol',$permiso);
        if (!is_null($rol)){
            $perfil->addRolNombre($rol);
        }
    }
    $perfil->setEstado(true);
    return $perfil;
}

header("location:/operador.php?modulo=perfiles");

?>