<?php
namespace CORE\Controlador;

class Entity_Manager extends Singleton {

        private $EntityManager;

        public function setEntityManager($EntityManager){
                $this->EntityManager = $EntityManager;
        }
        
        public function getEntityManager(){
                return $this->EntityManager;
                
        }

}

?>
