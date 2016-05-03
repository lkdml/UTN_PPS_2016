<?php
namespace CORE\Controlador;
require_once(__DIR__.'./../../bootstrap_orm.php');

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
