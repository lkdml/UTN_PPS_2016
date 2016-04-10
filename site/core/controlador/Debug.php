<?php
namespace CORE\Controlador;
 class Degub{

        private $logFile;
        private $LogWarn;

        public function __get($propiedad){
                if (property_exist($this, $propiedad)) {
                        return $this->$propiedad;
                }
        }
        public function __set($propiedad,$valor){
                if (property_exists($this, $propiedad)) {
                        $this->$propiedad = $valor;
                }
        }

        public function __construct(){
                $this->LogWarn = \CORE\Config::getPublic('LogWarn');
                $this->logfile = \CORE\Config::getPublic('LogFile');
        }

        public static function escribirLog($texto,$logear=false) {
                if (($this->LogWarn) || ($logear)) {
                        file_put_contents($this->logFile, $texto, FILE_APPEND | LOCK_EX);
                }
        }
    public static function vdump($parametro) {
        echo '<pre>';
        var_dump($parametro);
        echo '</pre>';
    }

}
?>
