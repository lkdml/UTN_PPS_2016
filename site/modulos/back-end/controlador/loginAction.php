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

use \CORE\Controlador\Aplicacion as Aplicacion;
/**
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$Operador =  $em->getRepository('Modelo\Operador')->find(1);
echo "<pre>";
Doctrine\Common\Util\Debug::dump($Operador);
echo "</pre>";
//var_dump($Operador->getRoles());
die;
**/


$app = Aplicacion::getInstancia();

if ($app->loginOperador($_POST["operador"],$_POST["clave"])){
    header("location:/operador.php?modulo=dashboard");
} else {
    header("location:/operador.php?modulo=login&error=Operador");
}

?>
