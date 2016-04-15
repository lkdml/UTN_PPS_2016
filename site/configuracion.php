<?php
/**
* @author   lkdml  
* @version  Core 1.0
* 
* Aquí se cargan todos los parametros de configuración que requiera la Aplicación. 
*/

$FullPath = str_replace('\\', '/',dirname(__FILE__) .'/');  //Ruta absoluta desde site
require_once($FullPath.'core/controlador/AutoLoaderClass.php');
require_once($FullPath.'core/configuracion.php');
require_once($FullPath.'modulos/configuracion.php');
use \CORE\Controlador\Config as Config;
 //rutas absolutas
               
 Config::setPublic('Ruta_App',$FullPath);
 Config::setPublic('Ruta_Modulos',Config::getPublic('Ruta_App').'modulos'.'/');
 Config::setPublic('Ruta_Modelo',Config::getPublic('Ruta_App').'modelo'.'/');
 
 Config::setPublic('LogWarn',true);
 Config::setPublic('LogFile',Config::getPublic('Ruta_App').'logs/logeo.log');

  
 //Configuración de mysql
 Config::setPublic('MySQL_Host', getenv('IP'));
 Config::setPublic('MySQL_DB','tmh');
 Config::setPublic('MySQL_User',getenv('C9_USER'));
 Config::setPublic('MySQL_Pass','');
 Config::setPublic('MySQL_Port',3306);
?>
