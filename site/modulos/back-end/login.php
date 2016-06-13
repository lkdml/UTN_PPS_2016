<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

$app = \CORE\Controlador\Aplicacion::getInstancia();

if ($_GET["logOut"]=='1'){
  $app->logout('back');
}

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
switch(strtolower($_GET['error'])){
  case 'operador':
    $vm->assign('error',"El operador o la clave son incorrectos");
    break;
  default:
    break;
}
$vm->display('login.tpl');
