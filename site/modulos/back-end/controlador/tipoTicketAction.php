<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\TicketTipo as TicketTipo;
Aplicacion::startSession(true);

$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['tipoTicket'])){
    if (!$permisos->verificarPermiso("tipoTicket_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $TTipo =  $em->getRepository('Modelo\TicketTipo')->find($_GET["tipoTicket"]);
        $TicketTipo = setear($TTipo,$em);
        $em->persist($TicketTipo);
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("tipoTicket_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $TicketTipo = setear(new TicketTipo(),$em);
        $em->persist($TicketTipo);
        $em->flush();
    }
}


function setear(TicketTipo $TicketTipo,$em){
    $TicketTipo->setNombre($_POST["nombre"]);
    $TicketTipo->setDescripcion($_POST["descripcion"]);
    $TicketTipo->setIcono($_POST["icono"]);
    $TicketTipo->setEstadoCierre($em->getRepository('Modelo\TicketEstado')->find($_POST["Estado"]));
    return $TicketTipo;
}
header("location:/operador.php?modulo=tipoTickets");

?>