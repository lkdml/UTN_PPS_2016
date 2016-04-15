<?php

/**
* @author   lkdml  
* @version  Core 1.0
* 
* Aquí se cargan todos los parametros de configuración que requiera el core. 
* No son los parametros de configuración de la aplicación.
*/
        
$FullPathCore = str_replace('\\', '/',dirname(__FILE__) .'/'); //Ruta absoluta desde el core.       

 //rutas absolutas
               
 \CORE\Controlador\Config::setPublic('Ruta_Core',$FullPathCore);
 \CORE\Controlador\Config::setPublic('Ruta_Core_Controlador',\CORE\Controlador\Config::getPublic('Ruta_Core').'controlador/');
 
 
 //SMARTY
 \CORE\Controlador\Config::setPublic('CORE_SMARTY',\CORE\Controlador\Config::getPublic('Ruta_Core').'libs/smarty/');
 \CORE\Controlador\Config::setPublic('CORE_SMARTY_CompileDir',dirname(\CORE\Controlador\Config::getPublic('Ruta_Core')).'/templates_c/');
 \CORE\Controlador\Config::setPublic('CORE_SMARTY_CacheDir',dirname(\CORE\Controlador\Config::getPublic('Ruta_Core')).'cache/');
 //\CORE\Controlador\Config::setPublic('CORE_SMARTY_ConfigDir',dirname(CORE\Controlador\Config::getPublic('Ruta_Core').'/').'configs/');
 //\CORE\Controlador\Config::setPublic('CORE_SMARTY_TemplateDir',dirname(CORE\Controlador\Config::getPublic('Ruta_Core').'/').'templates/');
?>
