<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\Prioridad as Prioridad;
Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['prioridadId'])){
    if (!$permisos->verificarPermiso("prioridades_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Prioridad =  $em->getRepository('Modelo\Prioridad')->find($_GET["prioridadId"]);
        $em->persist(setear($Prioridad,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("prioridades_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Prioridad = setear(new Prioridad(),$em);
        $em->persist($Prioridad);
        $em->flush();
    }
}


function setear(Prioridad $prioridad,$em){
    $prioridad->setNombre($_POST["nombre"]);
    $prioridad->setDescripcion($_POST["descripcion"]);
    $prioridad->setColor($_POST["color"]);
    $prioridad->setOrden($_POST["orden"]);
    if ($_POST["visibleFront"]=='on'){
        $prioridad->setVisibleFront(1);
    } else {
        $prioridad->setVisibleFront(0);
    }
    return $prioridad;
}

header("location:/operador.php?modulo=prioridades");

?>