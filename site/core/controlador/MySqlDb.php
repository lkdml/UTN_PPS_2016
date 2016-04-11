<?php
/*probar como opcion*/


define("DB_SERVER_REMOTO", "50.28.15.46");
define("USER_SERVER_REMOTO", "veaveoco");
define("PASS_SERVER_REMOTO", "2P1H5m55");
define("PORT_SERVER_REMOTO", "3306");

class MySqlDb {
    private $server;
    private $usuario;
    private $password;
    private $idconexion;
    private $db;
    private $resultado;
    private $hayResultados;

    function __construct() {
        $this->server = "localhost";
        $this->usuario = "veaveoco_userkpc";
        $this->password = "kl@7@uc1u5";
        $this->db = "veaveoco_kpc";
    }
    private function Conectar(){
        try {
            
            $sshConnection = ssh2_connect(DB_SERVER_REMOTO, 22);
            
            if ($sshConnection)
            {
                if (ssh2_auth_password($sshConnection, USER_SERVER_REMOTO, PASS_SERVER_REMOTO))
                {
                    $tunelSsh = ssh2_tunnel($sshConnection, DB_SERVER_REMOTO, PORT_SERVER_REMOTO);
                    //ssh2_exec($sshConnection, "ssh -f -L 3306:localhost:3306 veaveoco@50.28.15.46");
                    if ($tunelSsh)
                    {
                        //$this->server = $tunelSsh;
                        
                        $this->idconexion = mysql_connect($this->server, $this->usuario, $this->password);
                    }
                }
            }
        }
        catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return $this->idconexion;
    }
    private function Desconectar(){
        try {
            if ($this->idconexion){
                mysql_close($this->idconexion);
                return true;
            }
        }
        catch (Exception $ex){
            throw new Exception($ex->getMessage());
        }
        return false;
    }
    public function RealizarConsulta($strsql) {
        try{
            $this->Conectar();

            $this->hayResultados = 0;
                    
            if (mysql_select_db($this->db, $this->idconexion)){

                $this->resultado = mysql_query($strsql, $this->idconexion);

                if ($this->resultado){

                    $this->hayResultados = 1;
                    $this->Desconectar();
                }
            }
            else {
                throw new Exception("No existe la base de datos.");					
            }
        }
        catch (Exception $ex) {
            $this->Desconectar();

            throw new Exception($ex->getMessage());				
        }
    }
    public function ObtenerResultados() {
        $fila = null;
        
        try
        {	
            if (($fila = mysql_fetch_assoc($this->resultado)) != null) {
                return $fila;
            }
            else
            {
                $this->hayResultados = 0;
                return $fila;
            }
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }
    public function hayResultados() {
        return ($this->hayResultados);
    }
}

?>
