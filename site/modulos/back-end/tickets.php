<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
use \Modelo\Ticket as Ticket;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();
if (!$permisos->verificarPermiso("ticket_listar")){
        $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
    $app->setError($error);
    $app->guardarErrorEnSession();
    $permisos->redirigir("/operador.php?modulo=dashboard");
} else {
    $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
    $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                      \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                      \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
    $vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
    $vm->assign('OperadorLogueado',$app->getOperador());
    $vm->assign('Permisos',$permisos);
    if ($app->ifHayError()){
        $error =$app->recuperarErrorDeSession();
        $vm->assign('Error',$error);
    }
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    $criterio = array();
    // Traigo y proceso los ID de los departamentos que el Operador tiene acceso.
    $departamentos=$em->getRepository('Modelo\Operador')->find($app->getOperador()->getOperadorId())->getDepartamento(); 
    $first=false;

    // armo el criterio en base a los departamentos habilitados. Usando los solicitados por get, o todos los habilitados.
    if (isset($_GET['Deptos'])){
        $deptos = explode (',',$_GET['Deptos']);
        foreach ($deptos as $depto) {
            foreach  ($departamentos as $dptoOper) {
                if ($depto == $dptoOper->getDepartamentoId()){
                   if ($first){
                        $id = $depto;
                        $first=true;
                    } else {
                        $id = $id.",".$depto; 
                    } 
                }
            }
        }
    } else {
        foreach ($departamentos as $depto) {
            if ($first){
                $id = $depto->getDepartamentoId(); 
                $first=true;
            } else {
                $id = $id.",".$depto->getDepartamentoId(); 
            }
        }
    }
    $deptosOperador = explode (',',$id);
    $criterio['departamento']= $deptosOperador;
    
    if (isset($_GET['Estados'])){
        $estados = explode(',',$_GET['Estados']);
        $criterio['estado'] = $estados;
    }
    if (isset($_GET['Asignados'])){
        $estados = explode(',',$_GET['Estados']);
        $criterio['asignadoAOperador'] = $app->getOperador();
    }
    if (empty($criterio)){
        $ticket = $em->getRepository('Modelo\Ticket')->findAll();
    } else {
        $ticket = $em->getRepository('Modelo\Ticket')->findBy($criterio);
    }
    $vm->assign('Tickets',$ticket);
    
    $vm->display('grilla_tickets.tpl');
}