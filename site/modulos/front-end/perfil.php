<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
//Define autoloader
function __autoload($className) {
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }
      return false;
} 

require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

/*
session_start();   
    if (isset($_SESSION["autenticado"])) {
        $ejecutandoAPP = false;
        session_destroy(); 
    }
//    session_start();
*/

  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('LogIn_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Front').'css/',\CORE\Controlador\Config::getPublic('Ruta_Front').'js/',\CORE\Controlador\Config::getPublic('Ruta_Front').'imagenes/');

  $vm->display('perfil.tpl');
?>
