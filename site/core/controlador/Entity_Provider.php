<?php
namespace CORE\Controlador;
require_once(__DIR__.'./../../bootstrap_orm.php');
/**
 * @descripcion Se utiliza para no estar cargando varias veces las mismas consultas a las entidades.
 */
class Entity_Provider {
        
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

        private $EntityProvider;
        
        public function setEntityProvider($EntityProvider){
                $this->EntityProvider = $EntityProvider;
        }
        
        public function getEntityProvider(){
                return $this->EntityProvider;
                
        }
        

}

?>
