<?php
  
require_once('configuracion.php');  
require_once('./core/controlador/Aplicacion.php') ;

    if (!$ejecutandoAPP) die ('Accesso Denegado');
    //\CORE\Controlador\Aplicacion::startSession();


if (!isset($_GET['modulo'])) {
    require_once(\CORE\Controlador\Config::getPublic('Ruta_Front').'login.php');
  
}   else {  

    require_once(\CORE\Controlador\Config::getPublic('Ruta_Front').$_GET['modulo'].'.php');
}
?>
