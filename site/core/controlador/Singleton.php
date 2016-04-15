<?php
namespace CORE\Controlador;
/**
 * Instancia Singleton para que otras clases extiendan de esta.
 * @author lkdml
 * @version Core 1.0
 */
class Singleton
{
    private static $instancia;
    
    /**
     * Retorna la instancia de si misma.
     *
     * @return Instancia de Singleton class.
     */
    public static function getInstancia()
    {
      
      if (  !self::$instancia instanceof self)
      {
         self::$instancia = new static();
      }
      return self::$instancia;
    }

    protected function __construct()
    {
    }

    /**
     * Previene que clonen esta clase
     * 
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Previene que se serialice.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
