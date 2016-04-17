<?php
/**
* @author   lkdml  
* @version  Core 1.0
* 
* Aquí se cargan todos los parametros de configuración que requiera el módulo. 
*/

$FullPathModulos = str_replace('\\', '/',dirname(__FILE__) .'/'); //Ruta absoluta desde site
 //rutas absolutas
               
 \CORE\Controlador\Config::setPublic('Ruta_Front','./modulos/front-end/'); 
 \CORE\Controlador\Config::setPublic('Front_SMARTY_TemplateDir',\CORE\Controlador\Config::getPublic('Ruta_Front').'view/');
 \CORE\Controlador\Config::setPublic('Front_SMARTY_ConfigDir',\CORE\Controlador\Config::getPublic('Ruta_Front').'configs/');   

 
 
 \CORE\Controlador\Config::setPublic('Ruta_Back','./modulos/back-end/'); // relativo al path ./site/operador
 \CORE\Controlador\Config::setPublic('Back_SMARTY_TemplateDir',\CORE\Controlador\Config::getPublic('Ruta_Back').'view/');
 \CORE\Controlador\Config::setPublic('Back_SMARTY_ConfigDir',\CORE\Controlador\Config::getPublic('Ruta_Back').'configs/'); 

?>
