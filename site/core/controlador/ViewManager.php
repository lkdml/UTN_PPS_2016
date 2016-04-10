<?php
  /**
  * @author  lkdml
  * @version Core 1.0
  * 
  * Manejador de las vistas usando SMARTY
  */

//namespace CORE\Controlador;
 
require_once(\CORE\Controlador\Config::getPublic('CORE_SMARTY').'Smarty.class.php');

class ViewManager extends Smarty {

      
      public function __construct($Rutavistas,$RutaConfigs){
          parent::__construct();
          $this->setCompileDir(\CORE\Controlador\Config::getPublic('CORE_SMARTY_CompileDir'));      
          $this->setCacheDir(\CORE\Controlador\Config::getPublic('CORE_SMARTY_CacheDir')); 
          if  (!is_null($Rutavistas)) {
              $this->setTemplateDir($Rutavistas);
          }
          if  (!is_null($RutaConfigs)) {
              $this->setConfigDir($RutaConfigs);
          }
          
      }
      /**
      * Permite asignar las rutas de los estilos css y los js a 2 variables para utilizar en los tpl
      * 
      * @param mixed $rutaCSS
      * @param mixed $rutaJS
      */
      public function configPath($rutaCSS,$rutaJS,$rutaIMG){
          self::assign("rutaCSS",$rutaCSS);
          self::assign("rutaJS",$rutaJS);
          self::assign("rutaIMG",$rutaIMG);
      }
      
      

  }
  
?>
