<?php
  /*
    * @Descripcion:    login Action
    *
    * @Package:        CORE
    * @Autor:          lkdml
    * @Version:        1.0
    * 
    */
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');
use \CORE\Controlador\Aplicacion;

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$Operador =  $em->getRepository('Modelo\Operador')->findBy(array('Nombre_Usuario'=>$_POST["operador"]));
$ingresa=false;
if (!empty($Operador)){
    if ($Operador[0]->verificarClave($_POST["clave"])){
        $ingresa=true;
    }
}


if ($ingresa){
    Aplicacion::startSession(true,true);
    header("location:/operador.php?modulo=dashboard");
} else {
    header("location:/operador.php?modulo=login&error=Operador");
}

?>
