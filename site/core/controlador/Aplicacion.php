<?php
namespace CORE\Controlador;

    require_once('Debug.php');

class Aplicacion extends Singleton {
        public $session;
        private $userID;
        private $loggedIn;
        private $EM;

        public function setEM($EntityManager){
                $this->em = $EntityManager;
        }
        
        public function getEM(){return $this->$EM;}


        /**
        * Cargo las variables de session session_start(), pero antes verifico que el usuario este autenticado.
        * Si paso el parametro de autenticacion=true, creo las llaves de verificacion (utilizar luego de un login)
        *
        * @param boolean $autentica
        */
        public static function startSession($autentica=false){
                        if(!isset($_SESSION)) {
                                           session_start();
                                }
                //Si quiero autenticar al usuario
                if ($autentica==true) {
                    $_SESSION['tiempo']=strtotime('+10 minute') ;
                    $_SESSION["autenticado"]=true;
                    //\CORE\Aplicacion::isLoggedIn();
                }
                //Si no esta authenticado,  mato todo
                if (!(\CORE\Controlador\Aplicacion::isLoggedIn())) {
                    session_destroy();
                    echo 'Acceso no autorizado';die;
                    header("location:/index.php");
                    
                }



        }

        public static function isLoggedIn(){
                        $rta=false;
                if ($_SESSION["autenticado"]==true) {
                        if (isset($_SESSION['tiempo'])) {
                        $vida_session = $_SESSION['tiempo'] - time();
                                        if ($vida_session > $_SESSION['inactividadMax']) {
                                                $_SESSION['tiempo'] = strtotime('+10 minute');
                                                $rta=true;
                                        }
                        }
                }
                        return $rta;
        }

//        private function crearHash(){
//           return sha1(\CORE\Config::getPublic('hash'));
//        }

        private function validarHash($clave = null) {
            $rta = false;
            if(isset($clave)) {
                if($clave == $this->crearHash()){
                    $rta=true;
                }
            } else {
                if($_SESSION['hash'] == $this->crearHash()){
                    $rta=true;
                }
            }
            return $rta;
        }

        public function login($user){
        // TODO: Verifico si ya estoy logueado
        //      if($this->loggedIn){
        //      }
                if ($user){
                        $this->userID = $_SESSION['userID']=$user;
                }

        }
        public function logout() {
                unset($_SESSION['userID']);
                unset($this->userID);
        }

        public function checkLogin(){
                if(isset($_SESSION['userID'])){
                        $this->userID = $_SESSION['userID'];
                        $this->loggedIn = true;
                }else{
                        unset($this->userId);
                        $this->loggedIn = false;
                }
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

        /**
         * @desc Extraigo desde un mail la parte anterior al @
         * @param unknown $email
         * @return string
         */
        public static function obtenerUserFromEmail ($email) {
                $parts=explode('@',$email);
                return (string) $parts[0];
        }
        /**
         * @desc extraigo desde un email el dominio
         * @param unknown $email
         * @return string
         */
        public function obtenerDominioFromEmail ($email){
                $parts=explode('@',$email);
                return (string) $parts[1];
        }


}

?>
