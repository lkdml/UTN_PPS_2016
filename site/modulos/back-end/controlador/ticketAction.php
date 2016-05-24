<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\Ticket as Ticket;
use \Modelo\EmailQueue as EmailQueue;
$app = Aplicacion::getInstancia();
$app->startSession(true);
$operador = $app->getOperador();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['TicketId'])){
    $Ticket =  $em->getRepository('Modelo\Ticket')->find($_GET["TicketId"]);
    $em->persist(setear($Ticket,$em));
    $em->flush();
} else {
    $Ticket = setear(new Ticket(),$em);
    $em->persist($Ticket);
    $em->flush();
}



function generarCodigoTicket($em){
    $unique =   FALSE;
    $length =   7;
    $chrDb  =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
    while (!$unique){
          $str = '';
          for ($count = 0; $count < $length; $count++){
              $chr = $chrDb[rand(0,count($chrDb)-1)];
              if (rand(0,1) == 0){
                 $chr = strtolower($chr);
              }
              if (3 == $count){
                 $str .= '-';
              }
              $str .= $chr;
          }
          /* check if unique */
          $existingCode = $em->getRepository('Modelo\Ticket')->findBy(array("numeroTicket"=>$str));
          if (!$existingCode){
             $unique = TRUE;
          }
    }
    return $str;
}


function setear(Ticket $ticket,$em){
    $ticket->setNumeroTicket(generarCodigoTicket($em));
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
        $ticket->setOwnerOperadorId($em->getRepository('Modelo\Operador')->find($_POST["OperadorAsignado"]));
        $ticket->setAsignado(1);
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
    if (count($_POST["Archivo"]) > 0){
        $ticket->setTieneArchivos(1);
    }
    $ticket->setEditado(0);
    if (($_POST["CustomFields"]!="-1") && (!is_null($_POST["CustomFields"]))){
        $ticket->setCustomFields($em->getRepository('Modelo\TicketCustomFields')->find($_POST["CustomFields"]));
    }
    
    //TODO Aca hay que ver si va usuario u operador, pero hay que modificar la tpl
    $usuario = $em->getRepository('Modelo\Usuario')->findBy(array("email"=>$_POST["Propieatario"]));
    $ticket->setUsuario($usuario[0]);
    $ticket->setOperador($operador);
    return $ticket;
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
header("location:/operador.php?modulo=tickets&estado=1");

?>