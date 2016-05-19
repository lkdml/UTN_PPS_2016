<?php
namespace CORE\Controlador;
require_once(__DIR__.'./../../bootstrap_orm.php');

class Entity_Manager {
        
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

        private $EntityManager;
        
        public function setEntityManager($EntityManager){
                $this->EntityManager = $EntityManager;
        }
        
        public function getEntityManager(){
                return $this->EntityManager;
                
        }
        

}

?>
