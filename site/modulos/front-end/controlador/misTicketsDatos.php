<?php
use \CORE\Controlador\Aplicacion;
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");


Aplicacion::startSession($modoOP);
$app = Aplicacion::getInstancia();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$TicketTipos = $em->getRepository('Modelo\TicketTipo')->findAll();
$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();

foreach($Estados as $estado)
{
    $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                         ->Andwhere('t.estado = :estado')
                         ->Andwhere('t.usuario = :user')
                         ->setParameter('estado',$estado->getEstadoId())
                         ->setParameter('user',$app->getUsuario())
                         ->getQuery()
                         ->getResult());
    $arrayEstados[]=array("Estado-".$estado->getEstadoId() => $cantidad);
}
foreach($Departamentos as $depto)
{
    $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                         ->Andwhere('t.departamento = :depto')
                         ->Andwhere('t.usuario = :user')
                         ->setParameter('depto',$depto->getDepartamentoId())
                         ->setParameter('user',$app->getUsuario())
                         ->getQuery()
                         ->getResult());
    $arrayDepartamentos[]=array("Departamento-".$depto->getDepartamentoId() => $cantidad);
}
foreach($TicketTipos as $tt)
{
    $cantidad= count($em->getRepository('Modelo\Ticket')->createQueryBuilder('t')
                         ->Andwhere('t.tipoTicket = :tipo')
                         ->Andwhere('t.usuario = :user')
                         ->setParameter('tipo',$tt->getTipoTicketId())
                         ->setParameter('user',$app->getUsuario())
                         ->getQuery()
                         ->getResult());
    $arrayTipo[]=array("TipoTicket-".$tt->getTipoTicketId() => $cantidad);
}

$datosTicketsUsuario=array("Estado"=>$arrayEstados,"Departamento"=>$arrayDepartamentos,"TipoTicket"=>$arrayTipo);

echo json_encode($datosTicketsUsuario);

//[Estado:["Estado-id":2,"Cerrado-2":1],Tipo:["Tipo-id":1,"Problema-1":2],Departamento:["Depto-id":2]]
?>
