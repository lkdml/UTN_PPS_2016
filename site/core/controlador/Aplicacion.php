<?php
namespace CORE\Controlador;

    require_once('Debug.php');
    require_once(__DIR__.'./../../bootstrap_orm.php');
   

class Aplicacion {
    public $session;
    private $usuario;
    private $loggedIn;
    private $operador;
    private $permisos;
    private static $instancia;
    
    public function getOperador(){return $this->operador;}
    public function getUsuario(){return $this->usuario;}
    public function getPermisos(){
        $this->permisos->obtenerPermisosOperador($this->permisos->getPerfilId);
        return $this->permisos;
    }
    
    public function setoperador($operador){$this->operador = $operador;}
    public function setUsuario($usuario){$this->usuario = $usuario;}
    public function setPermisos($permisos){$this->permisos = $permisos;}
    

    
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
    
    public function guardarPermisosEnSession(){
        unset($_SESSION['Aplicacion']['Permisos']);
        $_SESSION['Aplicacion']['Permisos']=serialize($this->permisos);
    }

    public function recuperarPermisosDeSession(){
        $this->permisos = unserialize($_SESSION['Aplicacion']['Permisos']);
    }

    public function guardarOperadorEnSession(){
        $_SESSION['Aplicacion']['Operador']=serialize($this->operador);
    }
    
    public function recuperarOperadorDeSession(){
        $this->operador=unserialize($_SESSION['Aplicacion']['Operador']);
    }
    public function guardarUsuarioEnSession(){
        $_SESSION['Aplicacion']['Usuario']=serialize($this->usuario);
    }
    
    public function recuperarUsuarioDeSession(){
        $this->usuario=unserialize($_SESSION['Aplicacion']['Usuario']);
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
                session_destroy();
                if ($backEnd){
                        header("location:/operador.php");
                } else {
                        header("location:/index.php");
                }
                
            }
    }
    
    public function autenticarFrontOBack($backend){
            if ($backend==true) {
                $_SESSION['tiempo']=strtotime('+10 minute') ;
                $_SESSION["backAutenticado"]=true;
            } else {
                $_SESSION['tiempo']=strtotime('+10 minute') ;
                $_SESSION["frontAutenticado"]=true;    
            }
    }

    public function isLoggedIn($backend){
            $rta=false;
            if ($backend)
            {
                if ($_SESSION["backAutenticado"]==true) {
                    if (isset($_SESSION['tiempo'])) {
                        if ($_SESSION['tiempo'] > time()) {
                            $_SESSION['tiempo'] = strtotime('+10 minute');
                            $rta=true;
                        }
                    }
                    if (isset($_SESSION['Aplicacion']['Operador'])){
                        $this->recuperarOperadorDeSession();
                        if (isset($this->permisos)){
                            $this->permisos = new \CORE\Controlador\Permisos();
                        }
                        $this->recuperarPermisosDeSession();
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
                    if (isset($_SESSION['Aplicacion']['Usuario'])){
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
                $this->loggedIn = true;
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
                $this->loggedIn = true;
                $this->setUsuario($usuario[0]); 
                $this->startSession(false,true);
                $this->guardarUsuarioEnSession();
                return true;
            }
        }
        return false;
    }
    

    
    public function logout() {
            session_unset();
            session_destroy();
            unset($this->usuario);
            unset($this->operador);
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
