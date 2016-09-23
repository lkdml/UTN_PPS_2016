<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\Informes;
$app = Aplicacion::getInstancia();
$app->startSession(true);
$informe= new Informes();
use \Modelo\Ticket as Ticket;


    switch  (strtolower($_GET['datosAjax'])){
        case strtolower('W-tipoTicketMes'):
            echo $informe->devolverTipoTicketMes($app->getOperador()->getOperadorId());
            break;
        case strtolower('W-estadosTicket-Mes'):
            echo $informe->devolverEstadoTicketMes($app->getOperador()->getOperadorId());
            break;
        case strtolower('w-ticketsCerrados-Anual'):
            echo $informe->devolverTicketsCerradosAnual($app->getOperador()->getOperadorId());
            break;
        case strtolower('w-TicketXPrioridad-Mes'):
            echo $informe->devolverTicketPrioridadMes($app->getOperador()->getOperadorId());
            break;
        case strtolower('w-ticketsSinCerrar'):
            echo $informe->devolverCantidadTicketsSinCerrar();
            break;
        case strtolower('w-ticketsAsignados'):
            echo $informe->devolverCantidadTicketsAsignados($app->getOperador()->getOperadorId());
            break;
        case strtolower('w-usuariosExistentes'):
            echo $informe->devolverCantidadUsuarios();
            break;
        case strtolower('w-ticketsCerradosMesActual'):
            echo $informe->devolverCantidadTicketCerradosMes($app->getOperador()->getOperadorId());
            break;
        case strtolower('widgetEstados'):
          echo $informe->devolverCantidadTicketsPorEstado($app->getOperador()->getOperadorId(),true);
          break;
          
        case strtolower('lateralTickets'):
          echo $informe->devolverCantidadTicketsPorEstado($app->getOperador()->getOperadorId(),false);
          break;
          
        case strtolower('lateralDepartamentos'):
          echo $informe->devolverCantidadTicketsPorDepartamento($app->getOperador()->getOperadorId());
          break;

    }



?>