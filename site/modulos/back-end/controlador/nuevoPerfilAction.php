<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');

use \Modelo\Perfil as Perfil;
use \Modelo\Rol as Rol;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
if (isset($_GET['perfil'])){
    $getPerfil =  $em->getRepository('Modelo\Perfil')->find($_GET["perfil"]);
        $Perfil = setearPerfil($getPerfil,$em);
        $em->merge($Perfil);
        $em->flush();
} else {
   $Perfil = setearPerfil(new Perfil(),$em);
   $em->persist($Perfil);
   $em->flush();
}

function setearPerfil(Perfil $perfil,$em){
    $perfil->setNombre($_POST['Nombre']);
    $perfil->setDescripcion($_POST['Descripcion']);
    $perfil->setEstado(true);
    $perfil->getRoles()->clear();
    foreach ($_POST['permisos'] as $permiso=>$valor){
        $rol = $em->find('Modelo\Rol',$permiso);
        if (!is_null($rol)){
            $perfil->asignarRol($rol);
        }
    }
    $perfil->setEstado(true);
    return $perfil;
}

header("location:/operador.php?modulo=perfiles");

?>