<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;

$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
//$app->recuperarOperadorDeSession();
/**$app->getPermisos();
var_dump(Aplicacion::getInstancia()->getOperador()->getPerfil());

die;**/
  $vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
  $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                    \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
  //$vm->assign('permisos',Aplicacion::getInstancia()->getOperador()->getPerfil());

  $vm->display('dashboard.tpl');
