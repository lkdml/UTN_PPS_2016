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

if (isset($_GET['TicketId'])){
    if (!$permisos->verificarPermiso("ticket_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Ticket= setearTicket($em->getRepository('Modelo\Ticket')->find($_GET["TicketId"]),$em);
        $Log = logearCambios(new LogTicket(),$Ticket,false,$em,$operador->getOperadorId());
        $em->persist($Ticket);
        $em->persist($Log);
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("ticket_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Ticket = setearTicket(new Ticket(),$em);
        $Mensaje = setearMensaje(new Mensaje, $Ticket, $em,$operador->getOperadorId());
        $Log = logearCambios(new LogTicket(),$Ticket,true,$em,$operador->getOperadorId());
        $em->persist($Ticket);
        $em->persist($Mensaje);
        $em->persist($Log);
        $Mensaje = setearArchivosEnMensaje($Mensaje, $em);
        $em->flush();
    }

}
header("location:/operador.php?modulo=tickets");

function setearTicket(Ticket $ticket,$em){
   
    $ticket->setNumeroTicket($ticket->generarCodigoTicket($em));
    $ticket->setAsunto($_POST["Asunto"]);

    $ticket->setDescripcion($_POST["descripcion"]);
    $ticket->setEmailQueueID(1);
    if ($_POST["Departamento"]!="-1"){
        $ticket->setDepartamento($em->getRepository('Modelo\Departamento')->find($_POST["Departamento"]));
    }
    if ($_POST["TicketTipo"]!="-1"){
        $ticket->setTipoTicket($em->getRepository('Modelo\TicketTipo')->find($_POST["TicketTipo"]));
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
    }
    //TODO Ticket no tiene SLA en la BD
    if ($_POST["SLA"]!="-1"){
       // $ticket->setSla($em->getRepository('Modelo\SLA')->find($_POST["SLA"]));
    }
    $ticket->setUltimaActividad(new DateTime("NOW"));
    $ticket->setUltimaActividadUser(new DateTime("NOW"));
    $ticket->setUltimaActividadOperador(new DateTime("NOW"));
    $ticket->setFechaCreacion(new DateTime("NOW"));
    $ticket->setFechaVto(new DateTime("NOW"));

    $ticket->setEditado(0);
    if (($_POST["CustomFields"]!="-1") && (!is_null($_POST["CustomFields"]))){
        $ticket->setCustomFields($em->getRepository('Modelo\TicketCustomFields')->find($_POST["CustomFields"]));
    }
    switch ($_POST["Propietario-Tipo"]) {
        case 'Operador':
            $creador = $em->getRepository('Modelo\Operador')->findBy(array("email"=>$_POST["Creador"]));
            $ticket->setOperador($creador[0]);
            break;
        
        case 'Usuario': 
            $creador = $em->getRepository('Modelo\Usuario')->findBy(array("email"=>$_POST["Creador"]));
            $ticket->setUsuario($creador[0]);
            break;
        default:
            \CORE\Controlador\Dbug::getInstancia()->escribirLog("No existe el Propietario-Tipo declarado: ","TicketAction",true);
            header("location:/operador.php?modulo=tickets&error=4004");
            break;
    }
    
    
    return $ticket;
}

function setearMensaje(Mensaje $mensaje, Ticket $ticket,$em,$operadorId){
    if ($_POST["Descripcion"]) {
        $mensaje = new Mensaje();
        if ($_POST["agregaFirmaOperador"])
        {
            $mensajeConFirma=$_POST["Descripcion"]."\r\n".$em->getRepository('Modelo\Operador')->find($operadorId)->getFirmaMensaje();
            $mensaje->setTexto($mensajeConFirma);
        }
        else {
            $mensaje->setTexto($_POST["Descripcion"]);
        }
        
        $mensaje->setFecha(new DateTime("NOW"));
        $mensaje->setTipoMensaje(1); //TODO: No se lo que es tipo de mensaje integer pero le paso 1 como parametro
        $mensaje->setTicket($ticket);
        switch ($_POST["Propietario-Tipo"]) {
            case 'Operador':
                $creador = $em->getRepository('Modelo\Operador')->findBy(array("email"=>$_POST["Creador"]));
                $mensaje->setCreadorOperador($creador[0]->getOperadorId());
                break;
            
            case 'Usuario': 
                $creador = $em->getRepository('Modelo\Usuario')->findBy(array("email"=>$_POST["Creador"]));
                $mensaje->setCreadorUsuario($creador[0]->getUsuarioId());
                break;
            default:
                \CORE\Controlador\Dbug::getInstancia()->escribirLog("No existe el Propietario-Tipo declarado: ","TicketAction",true);
                header("location:/operador.php?modulo=tickets&error=4004");
                break;
        }
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

function logearCambios(LogTicket $log, Ticket $ticket,$alta, $em,$operadorId)
{
    $log->setOperadorId($operadorId);
    $operadorLog=$em->getRepository('Modelo\Operador')->find($operadorId);
    $log->setResponsable('Operador: '.$operadorLog->getNombre().' '.$operadorLog->getApellido());
    $log->setFecha(new DateTime("NOW"));
    $log->setTicket($ticket);
    if($alta)
    {
        $log->setAccion("Alta del ticket n°: " . $ticket->getNumeroTicket());
    }
    else{
        $cambios="";
        $TicketNoUpdated =  $em->getRepository('Modelo\Ticket')->find($_GET["TicketId"]);
        if ($TicketNoUpdated->getEmailQueueId() != $ticket->getEmailQueueId())
        {
            $cambios=$cambios."Cambio en Email Queue" . "\r\n";
        }
        
        if ($TicketNoUpdated->getAsunto() != $ticket->getAsunto())
        {
            $cambios=$cambios."Modificacion de Asunto" . "\r\n";
        }
        
        if ($TicketNoUpdated->getDescripcion() != $ticket->getDescripcion())
        {
            $cambios=$cambios."Modificacion en la descripción" . "\r\n";
        }
        
        if ($TicketNoUpdated->getFechaVto() != $ticket->getFechaVto())
        {
            $cambios=$cambios."Modificacion en la fecha de vencimiento" . "\r\n";
        }
        
        if ($TicketNoUpdated->getEstado() != $ticket->getEstado())
        {
            $cambios=$cambios."Cambio a estado ". $ticket->getEstado()->getNombre() . "\r\n";
        }
        
        if ($TicketNoUpdated->getPrioridad() != $ticket->getPrioridad())
        {
            $cambios=$cambios."Cambio a prioridad ". $ticket->getPrioridad()->getNombre() . "\r\n";
        }
        
        if ($TicketNoUpdated->getDepartamento() != $ticket->getDepartamento())
        {
            $cambios=$cambios."Cambio a departamento ". $ticket->getDepartamento()->getNombre() . "\r\n";
        }

        if ($TicketNoUpdated->getAsignadoAOperador() != $ticket->getAsignadoAOperador())
        {
            $cambios=$cambios."Asignado a operador". $ticket->getAsignadoAOperador()->getNombre() . "\r\n";
        }
        
        if ($TicketNoUpdated->getTipoTicket() != $ticket->getTipoTicket())
        {
            $cambios=$cambios."Cambio a tipo de ticket ". $ticket->getTipoTicket()->getNombre() . "\r\n";
        }
        
        $log->setAccion($cambios);
    }
    return $log;
    
}

?>