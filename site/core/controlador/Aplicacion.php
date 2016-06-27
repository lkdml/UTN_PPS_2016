<?php
namespace CORE\Controlador;

    require_once('Dbug.php');
    require_once(__DIR__.'./../../bootstrap_orm.php');
   

class Aplicacion {
    public  $session;
    private $usuario;
    private $loggedIn;
    private $operador;
    private $permisos;
    private $error;
    private static $instancia;
    
    public function getOperador(){return $this->operador;}
    public function getUsuario(){return $this->usuario;}
    public function getPermisos(){
        $this->permisos->obtenerPermisosOperador();
        return $this->permisos;
    }
    public function getError(boolean $unset=null){
        $ultimoError = $this->error;
        if (is_null($unset)){
            $this->error=null;
        }
        return $ultimoError;
    }
    
    public function setoperador($operador){$this->operador = $operador;}
    public function setUsuario($usuario){$this->usuario = $usuario;}
    public function setPermisos($permisos){$this->permisos = $permisos;}
    public function setError($error){$this->error = $error;}
    

    
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
    
    public function ifHayError(){
        if (isset($_SESSION['Aplicacion']['Error'])){
            return true;
        }
        return false;
    }
    
    public function guardarErrorEnSession(){
        unset($_SESSION['Aplicacion']['Error']);
        $_SESSION['Aplicacion']['Error']=serialize($this->error);
    }

    public function recuperarErrorDeSession(){
        $this->error = unserialize($_SESSION['Aplicacion']['Error']);
        unset($_SESSION['Aplicacion']['Error']);
        return $this->error;
    }
    
        public function guardarPermisosEnSession(){
        unset($_SESSION['back']['Permisos']);
        $_SESSION['back']['Permisos']=serialize($this->permisos);
    }

    public function recuperarPermisosDeSession(){
        $this->permisos = unserialize($_SESSION['back']['Permisos']);
    }

    public function guardarOperadorEnSession(){
        $_SESSION['back']['Operador']=serialize($this->operador);
    }
    
    public function recuperarOperadorDeSession(){
        $this->operador=unserialize($_SESSION['back']['Operador']);
    }
    public function guardarUsuarioEnSession(){
        $_SESSION['front']['Usuario']=serialize($this->usuario);
    }
    
    public function recuperarUsuarioDeSession(){
        $this->usuario=unserialize($_SESSION['front']['Usuario']);
    }

    protected function __construct(){}

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
            $app = Aplicacion::getInstancia();
            if(!isset($_SESSION)) {
                session_start();
            }
            //Si quiero autenticar al usuario
            if ($autentica==true) {
                $app->autenticarFrontOBack($backEnd);
            }
            //Si no esta authenticado,  mato todo
            if (!($app->isLoggedIn($backEnd))) {
                $app->logout($backEnd);
                if ($backEnd){
                        header("location:/operador.php");
                } else {
                        header("location:/index.php");
                }
                
            }
    }
    
    public function autenticarFrontOBack($backend){
            if ($backend==true) {
                $_SESSION['back']['tiempo']=strtotime('+10 minute') ;
                $_SESSION['back']["Autenticado"]=true;
            } else {
                $_SESSION['front']['tiempo']=strtotime('+10 minute') ;
                $_SESSION['front']["Autenticado"]=true;    
            }
    }

    public function isLoggedIn($backend){
            $rta=false;
            if ($backend)
            {
                if ($_SESSION['back']["Autenticado"]==true) {
                    if (isset($_SESSION['back']['tiempo'])) {
                        if ($_SESSION['back']['tiempo'] > time()) {
                            $_SESSION['back']['tiempo'] = strtotime('+10 minute');
                            $rta=true;
                        }
                    }
                    if (isset($_SESSION['back']['Operador'])){
                        $this->recuperarOperadorDeSession();
                        if (isset($this->permisos)){
                            $this->permisos = new \CORE\Controlador\Permisos();
                        }
                        $this->recuperarPermisosDeSession();
                    }
                }
            } else {
                if ($_SESSION['front']["Autenticado"]==true) {
                    if (isset($_SESSION['front']['tiempo'])) {
                        if ($_SESSION['front']['tiempo'] > time()) {
                            $_SESSION['front']['tiempo'] = strtotime('+10 minute');
                            $rta=true;
                        }
                    }
                    if (isset($_SESSION['front']['Usuario'])){
                        $this->recuperarUsuarioDeSession();
                    }
                }
            }
    return $rta;
    }


    public function loginoperador($operador,$clave){
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $operador =  $em->getRepository('Modelo\Operador')->findBy(array('nombreUsuario'=>$operador));
        if (!empty($operador)){
            if ($operador[0]->verificarClave($clave)){
                $this->loggedIn = array("Operador"=>true);
                $this->setoperador($operador[0]); 
                $this->startSession(true,true);
                $this->guardarOperadorEnSession();
                $this->permisos = new \CORE\Controlador\Permisos();
                $this->permisos->setPerfilId($this->operador->getPerfil()->getPerfilId());
                $this->permisos->obtenerPermisosOperador();
                $this->guardarPermisosEnSession();
                return true;
            }
        }
        return false;
    }
    
        public function loginUsuario($usuario,$clave){
        $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
        $usuario =  $em->getRepository('Modelo\Usuario')->findBy(array('email'=>$usuario));
             
       if (!empty($usuario)){
            if ($usuario[0]->verificarClave($clave)){
                $this->loggedIn = array("Usuario"=>true);
                $this->setUsuario($usuario[0]); 
                $this->startSession(false,true);
                $this->guardarUsuarioEnSession();
                return true;
            }
        }
        return false;
    }
    

    
    public function logout($modo=null) {
            switch ($modo) {
                case 'front':
                    $this->unsetUsuario();
                    break;
                case 'back':
                    $this->unsetOperador();
                    break;
                
                default:
                    $this->unsetOperador();
                    $this->unsetUsuario();
                    session_destroy();
                    break;
            }
    }
    
    public function unsetOperador(){
        session_start();
        unset($this->loggedIn["Operador"]);
        unset($this->permisos);
        unset($this->operador);
        unset($_SESSION['back']);
    }

    public function unsetUsuario(){
        session_start();
        unset($this->loggedIn["Usuario"]);
        unset($this->usuario);
        unset($_SESSION['front']);
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
