<?php
namespace CORE\Controlador;
/**
 * @descripcion Se utiliza para no estar cargando varias veces las mismas consultas a las entidades.
 */
class Entity_Repository {
        
        private static $instancia;
        private $entidades;
        private $numero;
        private $em;
        
        public function getNumero() {return $this->numero;}
        /**
         * @param $nombreEnditad 
         * @return calve del array en donde se encuentra
         */
        public function obtenerClaveDeEntidad($nombreEntidad){
                $ruta = explode("\\",$nombreEntidad);
                $laEntidad = array_pop($ruta);
                if (!array_key_exists($laEntidad,$this->entidades)){
                        $this->entidades[$laEntidad] = $this->em->getRepository($nombreEntidad)->findAll();
                        $this->numero ++;
                }
                return $laEntidad;
        }
        
        /**
         * @param $entidad ruta de la entidad usada como en getRepository del Doctrine
         * @return FindAll de la entidad seleccionada
         */
        public function findAll($entidad){
                $entidadCorta = $this->obtenerClaveDeEntidad($entidad);
                if (!array_key_exists($entidadCorta,$this->entidades)){
                        $this->entidades[$entidadCorta] = $this->em->getRepository($entidad)->findAll();
                }
                return $this->entidades[$entidadCorta];
        } 
        
        /**
         * @param $id a buscar de la entidad.
         * @param $entidad ruta de la entidad usada como en getRepository del Doctrine
         * @return FindAll de la entidad seleccionada
         */
        public function findById($id,$entidad){
                $entidadCorta = $this->obtenerClaveDeEntidad($entidad);
                $respuesta = array();
                if (!array_key_exists($entidadCorta,$this->entidades)){
                        $this->entidades[$entidadCorta] = $this->em->getRepository($entidad)->find($id);
                }
                $lista = $this->entidades[$entidadCorta];
                //if (is_null($funcion)){
                        $funcion = "get" .$entidadCorta . "Id";
                //}
                foreach ($lista as $item) {
                        if (method_exists($item,$funcion)){
                                if ($item->$funcion()==$id){
                                        $respuesta = $item;
                                }
                        }else {
                        }
                }
                return $respuesta;
        }
        
        /**
         * @param $array a buscar de la entidad.
         * @param $entidad ruta de la entidad usada como en getRepository del Doctrine
         * @return FindAll de la entidad seleccionada
         */
        public function findBy($array,$entidad){
                $entidadCorta = $this->obtenerClaveDeEntidad($entidad);
                $respuesta = array();
                //if (!array_key_exists($entidadCorta,$this->entidades)){
                        $this->entidades[$entidadCorta] = $this->em->getRepository($entidad)->findBy($array);
                //}
                return $this->entidades[$entidadCorta];
        }
        
        
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
         self::$instancia->em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        }
        return self::$instancia;
        } 

        
        protected function __construct()  {
                $this->entidades = array();
               $this->numero =0;
        }
        
        /**
        * Previene que clonen esta clase
        * 
        *
        * @return void
        */
        private function __clone() {
        }
        
        /**
        * Previene que se serialice.
        *
        * @return void
        */
        private function __wakeup() {
        }
        
        

}

?>
