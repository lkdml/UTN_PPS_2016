<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\EmailTemplates as Templates;
Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_POST["idTemplate"]) && !empty($_POST["idTemplate"])){
    
    if (!$permisos->verificarPermiso("general_plantillas")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Template =  $em->getRepository('Modelo\EmailTemplates')->find($_POST["idTemplate"]);
        $em->persist(setear($Template,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("general_plantillas")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Template = setear(new Templates(),$em);
        $Template->setTipo("custom");
        $em->persist($Template);
        $em->flush();
    }
}


function setear(Templates $template,$em){
    $template->setNombre($_POST["nombre"]);
    $template->setAsunto($_POST["asunto"]);
    $template->setTexto($_POST["editor1"]);

    return $template;
}

header("location:/operador.php?modulo=plantillas");

?>