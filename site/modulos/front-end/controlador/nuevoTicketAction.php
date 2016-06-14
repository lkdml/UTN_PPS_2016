<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\FileManager as FileManager;
use \Modelo\Ticket as Ticket;
use \Modelo\Mensaje as Mensaje;
use \Modelo\Usuario as Usuario;
use \Modelo\Archivo as Archivo;
use \Modelo\EmailQueue as EmailQueue;
$app = Aplicacion::getInstancia();
$app->startSession(false);
//TODO: esta linea se debe mejorar para usar el usuario desde session o app
$usuario = $em->getRepository('Modelo\Usuario')->find($app->getUsuario()->getUsuarioId());
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


$Ticket = setearTicket(new Ticket(),$usuario,$em);
$Mensaje = setearMensaje(new Mensaje, $Ticket, $usuario, $em);
$em->persist($Ticket);
$em->persist($Mensaje);
$Mensaje = setearArchivosEnMensaje($Mensaje, $em);
$em->flush();
header("location:/index.php?modulo=vistaTicket&ticket=".$Ticket->getTicketId()."&accion=ver");

function setearTicket(Ticket $ticket,Usuario $usuario, $em){
   
    $ticket->setNumeroTicket($ticket->generarCodigoTicket($em));
    $ticket->setAsunto($_POST["Asunto"]);

    $ticket->setDescripcion($_POST["descripcion"]);
    $ticket->setEmailQueueID(1); // TODO: hay que cambiar esto cuando este la cola de mails
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

    //TODO Ticket no tiene SLA en la BD
    if ($_POST["SLA"]!="-1"){
       // $ticket->setSla($em->getRepository('Modelo\SLA')->find($_POST["SLA"]));
    }
    $ticket->setUltimaActividad(new DateTime("NOW"));
    $ticket->setUltimaActividadUser(new DateTime("NOW"));
    $ticket->setFechaCreacion(new DateTime("NOW"));
    $ticket->setFechaVto(new DateTime("NOW")); //TODO: aca acplica sla

    $ticket->setEditado(0);
    if (($_POST["CustomFields"]!="-1") && (!is_null($_POST["CustomFields"]))){
        $ticket->setCustomFields($em->getRepository('Modelo\TicketCustomFields')->find($_POST["CustomFields"]));
    }
    $ticket->setUsuario($usuario);

    return $ticket;
}

function setearMensaje(Mensaje $mensaje, Ticket $ticket, Usuario $usuario,$em){
    if ($_POST["Descripcion"]) {
        $mensaje = new Mensaje();
        $mensaje->setTexto($_POST["Descripcion"]);
        $mensaje->setFecha(new \DateTime("NOW"));
        $mensaje->setTipoMensaje(1); //TODO: No se lo que es tipo de mensaje integer pero le paso 1 como parametro
        $mensaje->setTicket($ticket);
        $mensaje->setCreadorUsuario($usuario->getUsuarioId());
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



?>