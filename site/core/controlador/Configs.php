<?php
namespace CORE\Controlador;
  /**
  * @author lkdml
  * @version Core 1.0
  * 
  */
  

//require_once('AutoLoaderForClass.php');
require_once('Singleton.php');
             
abstract class Config extends Singleton {
   static private $protected = array(); // Para DB / claves etc
   static private $public = array(); // Para el resto de las cosas.

   public static function getProtected($key)
   { return isset(self::$protected[$key]) ? self::$protected[$key] : false;  }

   public static function getPublic($key)
   { return isset(self::$public[$key]) ? self::$public[$key] : false;  }
   
   public function __get($key)
   {
       return isset(self::$public[$key]) ? self::$public[$key] : false;
   }

    
   public static function setProtected($key,$value)
   {
       self::$protected[$key] = $value;
   }

   public static function setPublic($key,$value)
   {
       self::$public[$key] = $value;
   }    

   public function __isset($key)
   {
       return isset(self::$public[$key]);
   }

  
    
}
?>
