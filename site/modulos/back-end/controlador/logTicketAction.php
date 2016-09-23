<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\Grilla;

$app = Aplicacion::getInstancia();
$app->startSession(true);
$op=$app->getOperador();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


switch(strtolower($_GET["accion"])){
    case("datosticket"):
        traerDatosTicketJSON();
        break;
    case("datosusuario"):
        traerDatosUsuarioJSON();
        break;
}

//$Ticket= $em->getRepository('Modelo\LogModificacionTicket')->find($_GET['id']);

function traerDatosTicketJSON()
{
    $page = $_GET['page']; // get the requested page
    $limit = $_GET['rows']; // get how many rows we want to have into the grid
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
    $sord = $_GET['sord']; // get the direction
    if(!$sidx) $sidx =1;
    
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

    //Realizo el count del total de logs para ese ticket
    $count = count($em->getRepository('Modelo\LogModificacionTicket')->findBy(array('ticket'=>$_GET['ticketId'])));
    
    if( $count >0 ) {
    	$total_pages = ceil($count/$limit);
    } else {
    	$total_pages = 0;
    }
    
    if ($page > $total_pages) $page=$total_pages;
    $start = $limit*$page - $limit; 
    
    //Filtro por los valores y orden elegidos en la grilla
    
    $Logs = $em->getRepository('Modelo\LogModificacionTicket')->findBy(array('ticket'=>$_GET['ticketId']));
    
    if (strtolower($sidx)=='id')
    {
       $sidx='logId'; 
    }
    else{
       $sidx=strtolower($sidx);
    }
    
    $qb= $em->createQueryBuilder();
    $qb->select('t.logId,t.responsable,t.fecha,t.accion')
         ->from('Modelo\LogModificacionTicket','t')
         ->where('t.ticket = :ticketId')
         ->setParameter(':ticketId',$_GET['ticketId'])
         ->orderBy('t.'.$sidx,strtoupper($sord))
         ->setFirstResult( $start )
         ->setMaxResults( $limit );
    $Logs=$qb->getQuery()->getResult();
    
   
    $response = new stdClass();
    $response->page = $page;
    $response->total = $total_pages;
    $response->records = $count;
    
    $i=0;
    foreach ($Logs as $log) {
        $response->rows[$i]['id']=$log['logId'];
        $response->rows[$i]['cell']=array($log['fecha']->format('d-m-Y H:i:s'),$log['responsable'],$log['accion']); 
      
        $i++;
    }        
    echo json_encode($response);

}


function traerDatosUsuarioJSON()
{
    $page = $_GET['page']; // get the requested page
    $limit = $_GET['rows']; // get how many rows we want to have into the grid
    $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
    $sord = $_GET['sord']; // get the direction
    if(!$sidx) $sidx =1;
    
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

    //Realizo el count del total de logs para ese ticket
    $count = count($em->getRepository('Modelo\Ticket')->findBy(array('usuario'=>$_GET['usuarioId'])));
    
    if( $count >0 ) {
    	$total_pages = ceil($count/$limit);
    } else {
    	$total_pages = 0;
    }
    
    if ($page > $total_pages) $page=$total_pages;
    $start = $limit*$page - $limit; 

    if (strtolower($sidx)=='id')
    {
       $sidx='ticketId'; 
    }
    else{
       $sidx=strtolower($sidx);
    }
    
    $qb= $em->createQueryBuilder();
    $qb->select('t.ticketId,t.numeroTicket,tt.nombre as tipoTicket,e.nombre as estado,t.asunto,t.ultimaActividad')
         ->from('Modelo\Ticket','t')
         ->innerJoin('Modelo\TicketEstado', 'e', 'WITH', 'e.estadoId = t.estado')
         ->innerJoin('Modelo\TicketTipo', 'tt', 'WITH', 'tt.tipoTicketId = t.tipoTicket')
         ->where('t.usuario = :usuarioId')
         ->setParameter(':usuarioId',$_GET['usuarioId'])
         ->orderBy('t.'.$sidx,strtoupper($sord))
         ->setFirstResult( $start )
         ->setMaxResults( $limit );
    $Tickets=$qb->getQuery()->getResult();
    
    $response = new stdClass();
    $response->page = $page;
    $response->total = $total_pages;
    $response->records = $count;
    
    $i=0;
    foreach ($Tickets as $ticket) {
        $response->rows[$i]['id']=$ticket['ticketId'];
        $response->rows[$i]['cell']=array($ticket['numeroTicket'],$ticket['tipoTicket'],$ticket['estado'],$ticket['asunto'],$ticket['ultimaActividad']->format('d-m-Y H:i:s')); 
      
        $i++;
    }        
    echo json_encode($response);

}

