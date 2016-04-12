<?php
require_once('../../configuracion.php');
class ConexionComando 
{
	public static $objetoDatos;
	public $objetoMysqli;

	
	public function __construct()
	{
	    try
	    {
	    
		    
	        $this->objetoMysqli=  new mysqli(\CORE\Controlador\Config::getPublic('MySQL_Host')
	        						, \CORE\Controlador\Config::getPublic('MySQL_User')
	        						, \CORE\Controlador\Config::getPublic('MySQL_Pass')
	        						, \CORE\Controlador\Config::getPublic('MySQL_DB')
	        						, \CORE\Controlador\Config::getPublic('MySQL_Port'));
	
	        
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
	
	
     // Evita que el objeto se pueda clonar
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
	
}

?>