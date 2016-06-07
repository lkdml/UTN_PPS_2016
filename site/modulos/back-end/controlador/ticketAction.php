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
$app->startSession(true);
$operador = $app->getOperador();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['TicketId'])){
    $Ticket =  $em->getRepository('Modelo\Ticket')->find($_GET["TicketId"]);
    $em->persist(setearTicket($Ticket,$em));
    $em->flush();
} else {
    $Ticket = setearTicket(new Ticket(),$em);
    $Mensaje = setearMensaje(new Mensaje, $Ticket, $em);
    $em->persist($Ticket);
    $em->persist($Mensaje);
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


function setearTicket(Ticket $ticket,$em){
   
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
        $ticket->setOperador($em->getRepository('Modelo\Operador')->find($_POST["OperadorAsignado"]));
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
    if (count($_POST["Archivo"]) > 0){
        $ticket->setTieneArchivos(1);
    }
    $ticket->setEditado(0);
    if (($_POST["CustomFields"]!="-1") && (!is_null($_POST["CustomFields"]))){
        $ticket->setCustomFields($em->getRepository('Modelo\TicketCustomFields')->find($_POST["CustomFields"]));
    }
    //TODO Aca hay que ver si va usuario u operador, pero hay que modificar la tpl
    $propietariUsuario = $em->getRepository('Modelo\Usuario')->findBy(array("email"=>$_POST["Propietario"]));
    $ticket->setUsuario($propietariUsuario[0]);
    
    $archivo = new FileManager($em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_archivos")->getValor(),\CORE\Controlador\Config::getPublic('Ruta_Uploads'));
    $archivo->guardarArvhivosDePost($_FILES);
    \CORE\Controlador\Dbug::vdump($archivo);
    foreach ($archivo->getArrayNombres() as $archivo) {
        $dbArchivo = new Archivo();
        $dbArchivo->setNombre($archivo['name']);
        $dbArchivo->setHash($archivo['hashName']);
        $dbArchivo->setFechaCreacion(new DateTime("NOW"));
        $dbArchivo->setDirectorio($archivo['path']);
        // code...
    }
    //TODO faltan agregar al TPL
    $getOperador->setHashFoto([0]);
    
    return $ticket;
}

function setearMensaje(Mensaje $mensaje, Ticket $ticket,$em){
    $propietariUsuario = $em->getRepository('Modelo\Usuario')->findBy(array("email"=>$_POST["Propietario"]));
    $propietarioOperador = $em->getRepository('Modelo\Operador')->findBy(array("email"=>$_POST["Propietario"]));
    if ($_POST["Descripcion"]) {
        $mensaje = new Mensaje();
        $mensaje->setTexto($_POST["Descripcion"]);
        $mensaje->setFecha(new DateTime("NOW"));
        $mensaje->setTipoMensaje(1); //TODO: No se lo que es tipo de mensaje integer pero le paso 1 como parametro
        $mensaje->setTicket($ticket);
        if (!is_null($propietariUsuario)){
            $mensaje->setCreadorUsuario($propietariUsuario[0]->getUsuarioId());
        } else if (!is_null($propietarioOperador)){
            $mensaje->setCreadorOperador($propietarioOperador[0]->getOperadorId());
        }   
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
header("location:/operador.php?modulo=tickets&estado=1");

?>