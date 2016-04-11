<?php

class ConexionComando 
{
	public static $objetoDatos;
	public $objetoMysqli;

	public function __construct()
	{
	    try
	    {
	        $this->objetoMysqli=  new mysqli('mysql:host=localhost;dbname=practicafinal;charset=utf8','root','');
	
	        
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