<?php
namespace CORE\Controlador;

    require_once('Debug.php');
    require_once(__DIR__.'./../../bootstrap_orm.php');
   

class Aplicacion {
    public $session;
    private $usuario;
    private $loggedIn;
    private $Operador;
    private static $instancia;
    
    public function getOperador(){return $this->Operador;}
    public function getUsuario(){return $this->usuario;}
    
    public function setOperador($operador){$this->Operador = $operador;}
    
    /**
     * Retorna la instancia de si misma.
     *
     * @return Instancia de Singleton class.
     */
    public static function getInstancia()
    {
      if (  !self::$instancia instanceof self){
         self::$instancia = new self();
      }
      /*if (isset($_SESSION['Aplicacion'])) {
           self::$instancia =  unserialize($_SESSION['Aplicacion']);
       }*/
      return self::$instancia;
    }
    
    public function guardarOperadorEnSession(){
        if(!isset($_SESSION)) {
           session_start();
        }
        //unset($_SESSION['Aplicacion']);
        $_SESSION['Aplicacion']['Operador']=serialize($this->Operador);
    }
    
    public function recuperarOperadorDeSession(){
        if(!isset($_SESSION)) {
           session_start();
        }
        //unset($_SESSION['Aplicacion']);
        $this->Operador=unserialize($_SESSION['Aplicacion']['Operador']);
    }

    protected function __construct(){    }

    /**
     * Previene que clonen esta clase
     * 
     * @return void
     */
    private function __clone(){}

    /**
     * Previene que se serialice.
     *
     * @return void
     */
    private function __wakeup(){}
    
    /**
    * Cargo las variables de session session_start(), pero antes verifico que el usuario este autenticado.
    * Si paso el parametro de autenticacion=true, creo las llaves de verificacion (utilizar luego de un login)
    * @param boolean $backEnd (especifica el modo en el que se quiere ingresar frontend=false backend=true)
    * @param boolean $autentica
    */
    public static function startSession($backEnd=false,$autentica=false){
            if(!isset($_SESSION)) {
                       session_start();
            }
            //Si quiero autenticar al usuario
            if ($autentica==true) {
                \CORE\Controlador\Aplicacion::autenticarFrontOBack($backEnd);
            }
            //Si no esta authenticado,  mato todo
            if (!(\CORE\Controlador\Aplicacion::isLoggedIn($backEnd))) {
                session_destroy();
                if ($backEnd){
                        header("location:/operador.php");
                } else {
                        header("location:/index.php");
                }
                
            }
    }
    
    public static function autenticarFrontOBack($backend){
            if ($backend==true) {
                $_SESSION['tiempo']=strtotime('+5 minute') ;
                $_SESSION["backAutenticado"]=true;
            } else {
                $_SESSION['tiempo']=strtotime('+5 minute') ;
                $_SESSION["frontAutenticado"]=true;    
            }
    }

    public static function isLoggedIn($backend){
            $rta=false;
            if ($backend)
            {
                if ($_SESSION["backAutenticado"]==true) {
                    if (isset($_SESSION['tiempo'])) {
                        if ($_SESSION['tiempo'] > time()) {
                            $_SESSION['tiempo'] = strtotime('+5 minute');
                            $rta=true;
                        }
                    }
                }
            } else {
                if ($_SESSION["frontAutenticado"]==true) {
                    if (isset($_SESSION['tiempo'])) {
                        if ($_SESSION['tiempo'] > time()) {
                            $_SESSION['tiempo'] = strtotime('+5 minute');
                            $rta=true;
                        }
                    }
                }
            }
    return $rta;
    }


    public function loginOperador($operador,$clave){
        $app = \CORE\Controlador\Aplicacion::getInstancia();
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $Operador =  $em->getRepository('Modelo\Operador')->findBy(array('nombreUsuario'=>$operador));
        if (!empty($Operador)){
            //var_dump($Operador[0]->verificarClave(123));die;
            if ($Operador[0]->verificarClave($clave)){
                $app->loggedIn = true;
                $app->setOperador($Operador[0]); 
                \CORE\Controlador\Aplicacion::startSession(true,true);
                return true;
            }
        }
        return false;
    }
    
    public function getPermisos(){
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        var_dump($this->Operador->getPerfil());
        $Permisos =  $em->getRepository('Modelo\Perfil')->find($this->Operador->getPerfil());
        var_dump($Permisos);die;
        return $Permisos;
    }
    
    public function logout() {
            session_unset();
            session_destroy();
            unset($this->usuario);
            unset($this->Operador);
    }



    public  function get_remoteIp() {
            //Just get the headers if we can or else use the SERVER global
            if ( function_exists( 'apache_request_headers' ) ) {
                    $headers = apache_request_headers();
            } else {
                    $headers = $_SERVER;
            }

            //Get the forwarded IP if it exists
            if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
                    $the_ip = $headers['X-Forwarded-For'];
            } elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
            ) {
                    $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
            } else {
                    $the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
            }
            return $the_ip;

    }




}

?>
