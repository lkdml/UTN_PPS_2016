<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);

use \Modelo\Ticket as Ticket;
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$criterio = array();

if (isset($_GET['Deptos'])){
    $deptos = explode (',',$_GET['Deptos']);
    $criterio['departamento']= $deptos;
}
if (isset($_GET['Estados'])){
    $estados = explode(',',$_GET['Estados']);
    $criterio['estado'] = $estados;
}
if (empty($criterio)){
    $ticket = $em->getRepository('Modelo\Ticket')->findAll();
} else {
    $ticket = $em->getRepository('Modelo\Ticket')->findBy($criterio);
}
$vm->assign('Tickets',$ticket);

$vm->display('grilla_tickets.tpl');
