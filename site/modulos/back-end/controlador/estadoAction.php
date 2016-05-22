<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\TicketEstado as Estados;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

echo '<pre>' . var_dump($_POST) . '</pre>';

if (isset($_GET['estadoId'])){
    $Estado =  $em->getRepository('Modelo\TicketEstado')->find($_GET["estadoId"]);
    $em->persist(setear($Estado,$em));
    $em->flush();
} else {
    $Estado = setear(new TicketEstado(),$em);
    $em->persist($Estado);
    $em->flush();
}


function setear(Estados $estado,$em){
    $estado->setNombre($_POST["nombre"]);
    $estado->setDescripcion($_POST["descripcion"]);
    $estado->setAutocierre($_POST["autocierre"]);
    $estado->setColor($_POST["color"]);
    $estado->setOrden($_POST["orden"]);
    return $estado;
}


header("location:/operador.php?modulo=estados");

?>