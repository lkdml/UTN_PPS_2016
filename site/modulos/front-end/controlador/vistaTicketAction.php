<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\FileManager as FileManager;
use \Modelo\Ticket as Ticket;
use \Modelo\Mensaje as Mensaje;
use \Modelo\Archivo as Archivo;
use \Modelo\EmailQueue as EmailQueue;
$app = Aplicacion::getInstancia();
$app->startSession(false);
$usuario = $app->getUsuario();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
if (isset($_SESSION['LastTicketID'])){
    
        $Ticket =  $em->getRepository('Modelo\Ticket')->find($_SESSION['LastTicketID']);
       
        if ((!empty($_POST["Respuesta"]))){
            $Mensaje = setearMensaje(new Mensaje, $Ticket, $em, $usuario->getUsuarioId());
            $em->persist($Mensaje);
            $Mensaje = setearArchivosEnMensaje($Mensaje, $em);
        }
        if ($_GET['cierraTicket'])
        {
            $tipoTicket=$em->getRepository('Modelo\TicketTipo')->find($Ticket->getTipoTicket());
            $estado=$tipoTicket->getEstadoCierre();
            $Ticket->setEstado($estado);
            $em->persist($Ticket);
        }
        elseif ($_GET['reAbreTicket']){
            $tipoTicket=$em->getRepository('Modelo\TicketTipo')->find($Ticket->getTipoTicket());
            $estado=$tipoTicket->getEstadoApertura();
            $Ticket->setEstado($estado);
            $em->persist($Ticket);
        }
        else {
            $em->persist(setearTicket($Ticket,$em));
            $em->persist($Ticket);
        }
        $em->flush();
}




function setearTicket(Ticket $ticket,$em){
    $ticket->setUltimaActividad(new DateTime("NOW"));
    //$ticket->setUltimaActividadUser(new DateTime("NOW"));
    $ticket->setUltimaActividadOperador(new DateTime("NOW"));
    //$ticket->setFechaCreacion(new DateTime("NOW"));
    $vencimietno = new DateTime();
    $ticket->setFechaVto($vencimietno->setTimeStamp(strtotime('+2 hours'))); //TODO: cambiar vencimiento cuando este el sla
    return $ticket;
}

function setearMensaje(Mensaje $mensaje, Ticket $ticket,$em, $usuarioId){
    if (!empty($_POST["Respuesta"])) {
        $mensaje = new Mensaje();
        $mensaje->setTexto($_POST["Respuesta"]);
        $mensaje->setFecha(new DateTime("NOW"));
        $mensaje->setTipoMensaje(1); //TODO: No se lo que es tipo de mensaje integer pero le paso 1 como parametro para mensajes 
        $mensaje->setTicket($ticket);
        $mensaje->setCreadorUsuario($usuarioId);
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
header("location:/index.php?modulo=misTickets");

?>