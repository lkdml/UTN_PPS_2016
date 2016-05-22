<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\Prioridad as Prioridad;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['prioridadId'])){
    $Prioridad =  $em->getRepository('Modelo\Prioridad')->find($_GET["prioridadId"]);
    $em->persist(setear($Prioridad,$em));
    $em->flush();
} else {
    $Prioridad = setear(new Prioridad(),$em);
    $em->persist($Prioridad);
    $em->flush();
}


function setear(Prioridad $prioridad,$em){
    $prioridad->setNombre($_POST["nombre"]);
    $prioridad->setDescripcion($_POST["descripcion"]);
    $prioridad->setColor($_POST["color"]);
    $prioridad->setOrden($_POST["orden"]);
    return $prioridad;
}

header("location:/operador.php?modulo=prioridades");

?>