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

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
if ($app->loginUsuario($_POST["email"],$_POST["clave"])){
    $app->guardarUsuarioEnSession();
    header("location:/index.php?modulo=home");
} else {
    header("location:/index.php?modulo=login&error=Usuario");
}


?>
