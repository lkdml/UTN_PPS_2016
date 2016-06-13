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
$app = Aplicacion::getInstancia();

if ($app->loginOperador($_POST["operador"],$_POST["clave"])){
    header("location:/operador.php?modulo=dashboard");
} else {
    header("location:/operador.php?modulo=login&error=Operador");
}

?>
