<?php
/**
 * @author lkdml
 * @ver Core 1.0
 * @date 7/6/2016
 */
namespace CORE\Controlador;

class Degub {

        private $logFile;
        private $LogWarn;
        private static $instancia;
        
        public function setLogFile($log_file){$this->logFile=$log_file;}
        public function setLogWarn($warn){$this->LogWarn=$warn;}
        
        public function getLogFile(){return $this->logFile;}
        public function getLogWarn(){return $this->LogWarn;}

        protected function __construct(){}
        public static function getInstancia()
        {
                if (  !self::$instancia instanceof self){
                 self::$instancia = new self();
                 self::$instancia->setLogFile(\CORE\Controlador\Config::getPublic('LogFile'));
                 self::$instancia->setLogWarn(\CORE\Controlador\Config::getPublic('LogWarn'));
                }
                return self::$instancia;
        }
        

        public function escribirLog($texto,$dependencia=null,$logear=false) {
                if (($this->LogWarn) || ($logear)) {
                        file_put_contents($this->logFile,$dependencia.": ". $texto, FILE_APPEND | LOCK_EX);
                }
        }
    public static function vdump($parametro) {
        echo '<pre>';
        var_dump($parametro);
        echo '</pre>';
    }

}
?>
