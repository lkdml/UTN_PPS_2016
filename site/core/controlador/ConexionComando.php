<?php
namespace CORE\controlador;
require_once('../../configuracion.php');

use \mysqli as mysqli;
use \CORE\Controlador\Config as Config;

class ConexionComando 
{
	private static $objetoDatos;
	public $objetoMysqli;

	
	protected function __construct()
	{
	    try
	    {

	        $this->objetoMysqli=  new mysqli(Config::getPublic('MySQL_Host')
	        						, Config::getPublic('MySQL_User')
	        						, Config::getPublic('MySQL_Pass')
	        						, Config::getPublic('MySQL_DB')
	        						, Config::getPublic('MySQL_Port'));
    
	    }
	     catch (mysqli_sql_exception  $e) { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
			
	}
	

	public static function Obtener_Instancia()
	{
		if (!isset(self::$objetoDatos))
		{
			self::$objetoDatos= new ConexionComando();

		}
		return self::$objetoDatos;
	}

	public function RetornarConsulta($sql)
	{
		return $this->objetoMysqli->prepare($sql);
	}
	
	public function RetornarConsultaExtendida($sql)
	{
		return $this->objetoMysqli->query($sql,MYSQLI_USE_RESULT);
		
	}
	
	
     // Evita que el objeto se pueda clonar
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
	
}

?>