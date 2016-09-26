<?php
namespace CORE\Controlador;
/**
 * @descripcion Se utiliza para no estar cargando varias veces las mismas consultas a las entidades.
 */
class Entity_Repository extends Entity_Manager{
        
        private static $instancia;
        private $Entidades[];
        
        /**
         * @param $nombreEnditad 
         * @return calve del array en donde se encuentra
         */
        public function obtenerClaveDeEntidad($nombreEntidad){
                $ruta = explode("\\",$nombreEntidad);
                $laEntidad = array_pop($ruta);
                if (!array_key_exists($laEntidad,$this->entidades)){
                        $this->entidades[$laEntidad] = $this->getEntityManager()->getRepository($nombreEntidad)->findAll();
                }
                return $laEntidad;
        }
        
        /**
         * @param $entidad ruta de la entidad usada como en getRepository del Doctrine
         * @return FindAll de la entidad seleccionada
         */
        public function findAll($entidad){
                return $this->entidades[$this->obtenerClaveDeEntidad($entidad)];
        } 
        
        /**
         * @param $id a buscar de la entidad.
         * @param $entidad ruta de la entidad usada como en getRepository del Doctrine
         * @return FindAll de la entidad seleccionada
         */
        public function findById($id,$entidad){
                $respuesta = array();
                $lista = $this->entidades[$this->obtenerClaveDeEntidad($entidad)];
                $funcion = "get" + $entidad + "Id";
                foreach ($lista as $item) {
                        if ($item->$funcion()==$id){
                                $respuesta = $item;
                                break;
                        }
                }
                return $respuesta;
        }
        
        
        /**
        * Retorna la instancia de si misma.
        *
        * @return Instancia de Singleton class.
        
        public static function getInstancia()
        {
        
        if (  !self::$instancia instanceof self)
        {
         self::$instancia = new static();
        }
        return self::$instancia;
        }
        */
        
        protected function __construct()  {
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
