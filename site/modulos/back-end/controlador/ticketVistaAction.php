<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\FileManager as FileManager;
use \Modelo\Ticket as Ticket;
use \Modelo\Mensaje as Mensaje;
use \Modelo\Archivo as Archivo;
use \Modelo\EmailQueue as EmailQueue;
use \Modelo\LogModificacionTicket as LogTicket;

$app = Aplicacion::getInstancia();
$app->startSession(true);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$operador = $app->getOperador();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_SESSION['LastTicketID'])){
    if (!$permisos->verificarPermiso("ticket_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Ticket= $em->getRepository('Modelo\Ticket')->find($_SESSION['LastTicketID']);
        $Log = logearCambios(new LogTicket(),$Ticket,$em,$operador->getOperadorId());
        $em->persist(setearTicket($Ticket,$em));
        $em->persist($Log);
        if ((!empty($_POST["Respuesta"])) || (!empty($_POST["NotaOperador"]))){
            $Mensaje = setearMensaje(new Mensaje, $Ticket, $em, $operador->getOperadorId());
            $em->persist($Mensaje);
            $Mensaje = setearArchivosEnMensaje($Mensaje, $em);
        }
        $em->flush();
    }
} else {
    header("location:/operador.php?modulo=tickets");
}
header("location:/operador.php?modulo=tickets");




function setearTicket(Ticket $ticket,$em){

    if ($_POST["Departamento"]!="-1"){
        $ticket->setDepartamento($em->getRepository('Modelo\Departamento')->find($_POST["Departamento"]));
    }
    if ($_POST["Prioridad"]!="-1"){
        $ticket->setPrioridad($em->getRepository('Modelo\Prioridad')->find($_POST["Prioridad"]));
    }
    if ($_POST["Estado"]!="-1"){
        $ticket->setEstado($em->getRepository('Modelo\TicketEstado')->find($_POST["Estado"]));
    }
    if ($_POST["OperadorAsignado"]!="-1"){
        $ticket->setAsignadoAOperador($em->getRepository('Modelo\Operador')->find($_POST["OperadorAsignado"]));
        $ticket->setAsignado(1); // TODO: Debemos arreglar el asignado 1 o 0
    } else {
        $ticket->setAsignadoAOperador(null);
        $ticket->setAsignado(0); // TODO: Debemos arreglar el asignado 1 o 0
    }
    //TODO Ticket no tiene SLA en la BD
    if ($_POST["SLA"]!="-1"){
       // $ticket->setSla($em->getRepository('Modelo\SLA')->find($_POST["SLA"]));
    }
    $ticket->setUltimaActividad(new DateTime("NOW"));
    //$ticket->setUltimaActividadUser(new DateTime("NOW"));
    $ticket->setUltimaActividadOperador(new DateTime("NOW"));
    //$ticket->setFechaCreacion(new DateTime("NOW"));
    $vencimietno = new DateTime();
    $ticket->setFechaVto($vencimietno->setTimeStamp(strtotime('+2 hours'))); //TODO: cambiar vencimiento cuando este el sla
//TODO: setear campos custom cuando existan.
    if (($_POST["CustomFields"]!="-1") && (!is_null($_POST["CustomFields"]))){
        $ticket->setCustomFields($em->getRepository('Modelo\TicketCustomFields')->find($_POST["CustomFields"]));
    }
    return $ticket;
}

function setearMensaje(Mensaje $mensaje, Ticket $ticket,$em, $operadorId){
    if (!empty($_POST["Respuesta"])) {
        $mensaje = new Mensaje();
        if ($_POST["agregaFirmaOperador"])
        {
            $mensajeConFirma=$_POST["Respuesta"]."\r\n".$em->getRepository('Modelo\Operador')->find($operadorId)->getFirmaMensaje();
            $mensaje->setTexto($mensajeConFirma);
        }
        else {
            $mensaje->setTexto($_POST["Respuesta"]);
        }
        
        $mensaje->setFecha(new DateTime("NOW"));
        $mensaje->setTipoMensaje(1); //TODO: No se lo que es tipo de mensaje integer pero le paso 1 como parametro para mensajes 
        $mensaje->setTicket($ticket);
        $mensaje->setCreadorOperador($operadorId);
    } else if (!empty($_POST["NotaOperador"])) {
        $mensaje = new Mensaje();
        $mensaje->setTexto($_POST["NotaOperador"]);
        $mensaje->setFecha(new DateTime("NOW"));
        $mensaje->setTipoMensaje(0); //TODO: No se lo que es tipo de mensaje integer pero le paso 0 como parametro para notas internas
        $mensaje->setTicket($ticket);
        $mensaje->setCreadorOperador($operadorId);
        
    }
    return $mensaje;
}

function setearArchivosEnMensaje($mensaje, $em){
    $archivo = new FileManager($em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_archivos")->getValor(),\CORE\Controlador\Config::getPublic('Ruta_Uploads'));
    $archivo->guardarArchivosDePost($_FILES);
    foreach ($archivo->getArrayNombres() as $archivo) {
        $dbArchivo = new Archivo();
        $dbArchivo->setNombre($archivo['name']);
        $dbArchivo->setHash($archivo['hashName']);
        $dbArchivo->setFechaCreacion(new DateTime("NOW"));
        $dbArchivo->setDirectorio($archivo['path']);
        $dbArchivo->setMensaje($mensaje);
        $em->persist($dbArchivo);
    }
    return $mensaje;
}

//TODO Esto hay que cambiarlo, Hay que agregarle un template y hacer un parseo para reemplazar data
function setearEmailQueue($remitente,$destinatario,$ticketNumber,$em){
    $queue = new EmailQueue();
    if ($remitente instanceof Operador){
        $queue->setRemitente($remitente);
    } else if ( $remitente instanceof Usuario){
        $queue->setRemitente($remitente);
    } else { echo "error de tipos"; die;}
    
    if ($destinatario instanceof Operador){
        $queue->setDestinatario($destinatario);
    } else if ( $destinatario instanceof Usuario){
        $queue->setDestinatario($destinatario);
    } else { echo "error de tipos"; die;}
    $queue->setAsunto("Nuevo Ticket generado: ".$ticketNumber);
    $queue->setContenido("Esto debemos tomarlo desde una plantilla de correo y reemplazar datos");
    $queue->setEstado(0);
    $queue->setFechaEnvio(null);
    return $queue;
    
}

function logearCambios(LogTicket $log, Ticket $ticket,$em,$operadorId)
{
    $log->setOperadorId($operadorId);
    $operadorLog=$em->getRepository('Modelo\Operador')->find($operadorId);
    $log->setResponsable('Operador: '.$operadorLog->getNombre().' '.$operadorLog->getApellido());
    $log->setFecha(new DateTime("NOW"));
    $log->setTicket($ticket);

    $cambios="";

    if ($em->getRepository('Modelo\TicketEstado')->find($_POST["Estado"]) != $ticket->getEstado())
    {
        $cambios=$cambios."Cambio a estado ". $em->getRepository('Modelo\TicketEstado')->find($_POST["Estado"])->getNombre() . "\r\n";
    }
    if ($em->getRepository('Modelo\Prioridad')->find($_POST["Prioridad"]) != $ticket->getPrioridad())
    {
        $cambios=$cambios."Cambio a prioridad ". $em->getRepository('Modelo\Prioridad')->find($_POST["Prioridad"])->getNombre() . "\r\n";
    }
    
    if ($em->getRepository('Modelo\Departamento')->find($_POST["Departamento"]) != $ticket->getDepartamento())
    {
        $cambios=$cambios."Cambio a departamento ". $em->getRepository('Modelo\Departamento')->find($_POST["Departamento"])->getNombre() . "\r\n";
    }
   
    if ($em->getRepository('Modelo\Operador')->find($_POST["OperadorAsignado"]) != $ticket->getAsignadoAOperador())
    {
         if ($_POST["OperadorAsignado"]=="-1"){
             $cambios=$cambios."Sin operador asignado";
         }
        else{
         $cambios=$cambios."Asignado a operador". $em->getRepository('Modelo\Operador')->find($_POST["OperadorAsignado"])->getNombre() . "\r\n";   
        }
        
    }

    $log->setAccion($cambios);

    return $log;
    
}


?>