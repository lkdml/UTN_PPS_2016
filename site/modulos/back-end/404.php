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


  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',\CORE\Controlador\Config::getPublic('Ruta_Back').'js/',\CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');

  $vm->display('404.tpl');
?>
