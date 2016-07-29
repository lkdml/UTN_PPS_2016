<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\Informes;
$app = Aplicacion::getInstancia();
$app->startSession(true);
$informe= new Informes();

    switch  (strtolower($_GET['tipoInforme'])){
        case strtolower('usuariosempresa'):
            echo $informe->usuariosPorEmpresa();
            break;
        case strtolower('ticketsporempresa'):
            echo $informe->ticketsPorEmpresa($_GET['Desde'],$_GET['Hasta']);
            break;
        case strtolower('ticketsporempresaporestado'):
            echo $informe->devolverTicketsPorEstadoPorEmpresa($_GET['Desde'],$_GET['Hasta'],$_GET['Estado'],$_GET['Empresa']);
            break;
        case strtolower('ticketspordepartamento'):
            echo $informe->devolverTicketsPorDepartamento($_GET['Desde'],$_GET['Hasta'],$_GET['Departamentos']);
            break;    
        case strtolower('ticketporprioridad'):
            echo $informe->devolverTicketsPorPrioridad($_GET['Desde'],$_GET['Hasta']);
            break;  
        
    }



?>