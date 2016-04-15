<?php
/**
* @author   lkdml  
* @version  Core 1.0
* 
* Aquí se cargan todos los parametros de configuración que requiera la Aplicación. 
*/

define('RAIZ', str_replace('\\', '/',dirname(__FILE__) .'/'));  //Ruta absoluta desde site
require_once($FullPath.'core/controlador/AutoLoaderClass.php');
require_once($FullPath.'core/configuracion.php');
require_once($FullPath.'modulos/configuracion.php');

 //rutas absolutas
               
 \CORE\Controlador\Config::setPublic('Ruta_App','/');
 \CORE\Controlador\Config::setPublic('Ruta_Modulos',\CORE\Controlador\Config::getPublic('Ruta_App').'modulos'.'/');
 
 
 \CORE\Controlador\Config::setPublic('LogWarn',true);
 \CORE\Controlador\Config::setPublic('LogFile',\CORE\Controlador\Config::getPublic('Ruta_App').'logs/logeo.log');

  
 //Configuración de mysql
 \CORE\Controlador\Config::setPublic('MySQL_Host', getenv('IP'));
 \CORE\Controlador\Config::setPublic('MySQL_DB','tmh');
 \CORE\Controlador\Config::setPublic('MySQL_User',getenv('C9_USER'));
 \CORE\Controlador\Config::setPublic('MySQL_Pass','');
 \CORE\Controlador\Config::setPublic('MySQL_Port',3306);
?>
