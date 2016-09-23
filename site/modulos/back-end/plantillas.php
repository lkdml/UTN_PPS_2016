<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
use \Modelo\EmailTemplates as EmailTemplates;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);

if(isset($_GET['plantillaId']))
{
    $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    
    if(isset($_GET['delete']))
    {
        $em->remove($em->getRepository('Modelo\EmailTemplates')->find($_GET['plantillaId']));
        $em->flush();
    }
    else
    {
        $plantilla = $em->getRepository('Modelo\EmailTemplates')->find($_GET['plantillaId']);
        
        echo json_encode(array('nombre'=>$plantilla->getNombre(),'titulo'=>$plantilla->getAsunto(),'body'=>$plantilla->getTexto()));
    }
}
else
{
$permisos =$app->getPermisos();

if (!$permisos->verificarPermiso("general_plantillas")){
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
    
    $plantillas = $em->getRepository('Modelo\EmailTemplates')->findAll();
    
    $vm->assign('EmailTemplates',$plantillas);
    
    $vm->display('grilla_plantillas.tpl');
}
}