<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\TicketTipo as TicketTipo;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['tipoTicket'])){
    $TTipo =  $em->getRepository('Modelo\TicketTipo')->find($_GET["tipoTicket"]);
    $TicketTipo = setear($TTipo,$em);
    $em->persist($TicketTipo);
    $em->flush();
} else {
    $TicketTipo = setear(new TicketTipo(),$em);
    $em->persist($TicketTipo);
    $em->flush();
}


function setear(TicketTipo $TicketTipo,$em){
    $TicketTipo->setNombre($_POST["nombre"]);
    $TicketTipo->setDescripcion($_POST["descripcion"]);
    $TicketTipo->setIcono($_POST["icono"]);
    return $TicketTipo;
}
header("location:/operador.php?modulo=tipoTickets");

?>