<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\TicketEstado as Estados;
Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


if (isset($_GET['estadoId'])){
    if (!$permisos->verificarPermiso("estados_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Estado =  $em->getRepository('Modelo\TicketEstado')->find($_GET["estadoId"]);
        $em->persist(setear($Estado,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("estados_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Estado = setear(new Estados(),$em);
        $em->persist($Estado);
        $em->flush();
    }
}


function setear(Estados $estado,$em){
    $estado->setNombre($_POST["nombre"]);
    $estado->setDescripcion($_POST["descripcion"]);
    if ($_POST["autocierre"] == 'on')
    {
      $estado->setAutocierre(true);   
    }
    else{
       $estado->setAutocierre(false);
    }
    if ($_POST["estadoFinal"] == 'on')
    {
      $estado->setEstadofinal(true);   
    }
    else{
       $estado->setEstadofinal(false);
    }
    $estado->setColor($_POST["color"]);
    $estado->setIcono($_POST["icono"]);
    $estado->setOrden($_POST["orden"]);
    return $estado;
}


header("location:/operador.php?modulo=estados");

?>
