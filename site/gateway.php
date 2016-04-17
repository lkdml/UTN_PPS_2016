<?php
  
require_once('configuracion.php');  
require_once('./core/controlador/Aplicacion.php') ;

    //\CORE\Controlador\Aplicacion::startSession();

if ($modoOP) {
    if (!isset($_GET['modulo'])) {
        require_once(\CORE\Controlador\Config::getPublic('Ruta_Back').'login.php');
      
    }   else {  
        if (file_exists(\CORE\Controlador\Config::getPublic('Ruta_Back').$_GET['modulo'].'.php')) {
            require_once(\CORE\Controlador\Config::getPublic('Ruta_Back').$_GET['modulo'].'.php');
        } else {
            require_once(\CORE\Controlador\Config::getPublic('Ruta_Back').'404.php');
        }
    }  
} else {
    if (!isset($_GET['modulo'])) {
        require_once(\CORE\Controlador\Config::getPublic('Ruta_Front').'login.php');
      
    }   else {  
        if (file_exists(\CORE\Controlador\Config::getPublic('Ruta_Front').$_GET['modulo'].'.php')) {
            require_once(\CORE\Controlador\Config::getPublic('Ruta_Front').$_GET['modulo'].'.php');
        } else {
            require_once(\CORE\Controlador\Config::getPublic('Ruta_Front').'404.php');
        }
    }    
}

?>
