<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 


use \CORE\Controlador\Aplicacion;
use \Modelo\Sla as Sla;

$app = Aplicacion::getInstancia();
$app->startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['slaId'])){
    $Sla =  $em->getRepository('Modelo\Sla')->find($_GET["slaId"]);
    $em->persist(setear($Sla,$em));
    $em->flush();
} else {
    $Sla = setear(new Sla(),$em);
    $em->persist($Sla);
    $em->flush();
}


function setear(Sla $sla,$em){
    
    $sla->setNombre($_POST["nombre"]);
    if (isset($_POST["descripcion"]))
    {
        $sla->setDescripcion($_POST["descripcion"]); 
    }
     if (isset($_POST["departamentoOrigen"]))
    {
        $sla->setDepartamentoOrigen($_POST["departamentoOrigen"]);
    }
    if (isset($_POST["estadoOrigen"]))
    {
        $sla->setEstadoOrigen($_POST["estadoOrigen"]);
    }
    if (isset($_POST["prioridadOrigen"]))
    {
        $sla->setPrioridadOrigen($_POST["prioridadOrigen"]);
    }
    $sla->setTipoTicketOrigen($em->getRepository('Modelo\TicketTipo')->find($_POST["tipoTicketOrigen"]));
    $sla->setCondicionHora($_POST["condicionHora"]);
    if (isset($_POST["accionDepartamento"]))
    {
        $sla->setAccionDepartamento($_POST["accionDepartamento"]);
    }
    if (isset($_POST["accionEstado"]))
    {
        $sla->setAccionEstado($_POST["accionEstado"]);
    }
    if (isset($_POST["accionPrioridad"]))
    {
        $sla->setAccionPrioridad($_POST["accionPrioridad"]);
    }
    if (isset($_POST["accionOperadorAsignado"]))
    {
        $sla->setAccionOperadorAsignado($_POST["accionOperadorAsignado"]);
    }
    
     if (isset($_POST["estado"]))
    {
        $sla->setEstado(1);
    } else {
        $sla->setEstado(0);
    }
    
    $sla->setEliminado(false);
    
    $sla->setEmailTemplate($em->getRepository('Modelo\EmailTemplates')->find($_POST["template"]));
    
    
    return $sla;
}



header("location:/operador.php?modulo=slas");

?>