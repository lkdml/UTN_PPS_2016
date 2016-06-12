<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
use \Modelo\Departamento as Departamento;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();

if (!$permisos->verificarPermiso("departamentos_listar")){
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
    $departamentos = $em->getRepository('Modelo\Departamento')->findAll();
    
    $vm->assign('Departamentos',$departamentos);
    
    $vm->display('grilla_departamentos.tpl');
}