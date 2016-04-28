<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
Aplicacion::startSession($modoOP);

  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');

  $vm->display('grilla_prioridades.tpl');
