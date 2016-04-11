<?php

class Usuario {
 	
 	private $_Usuario_ID;
	private $_Nombre_Usuario;
	private $_Nombre;
	private $_Apellido;
	private $_Email;
	private $_FotoHash;
	private $_Direccion;
	private $_Codigo_Postal;
	private $_Ciudad_ID;
	private $_Telefono;
	private $_Mail_Adicional;
	private $_Perfil_ID;
	private $_Empresa_ID;
	private $_Ultima_Actualizacion;
	private $_Ultima_Actividad;
	private $_Activo;
	private $_Eliminado;

	public function __get($property) {
	if (property_exists($this, $property)) {
	  return $this->$property;
	}
	}
	
	public function __set($property, $value) {
	if (property_exists($this, $property)) {
	  $this->$property = $value;
	}
	
	return $this;
	}
	
	
	//Constructor Default
	function __construct() 
	{}
	
		//Constructor Default
	function __construct($Usuario_ID) 
	{
		$this->_Usuario_ID=$Usuario_ID;
	}
	
	private function Obtener_Usuario()
	{
		//Tener lista la conexion para ver este tema
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Select Nombre_Usuario
						,Nombre
						,Apellido
						,Email
						,FotoHash
						,Direccion
						,Codigo_Postal
						,Ciudad_ID
						,Telefono
						,Mail_Adicional
						,Perfil_ID
						,Empresa_ID
						,Ultima_Actualizacion
						,Ultima_Actividad
						,Activo
						,Eliminado
				from usuarios
				where Usuario_ID=?";
		
		/*VER DE HACERLO EN TXT LA CONSULTA Y LEVANTARLO DESDE RESOURCES*/
				
		if ($result = $conexion->RetornarConsulta($query)) {
			
			/*
			BIND PARAMETROS
			i	la variable correspondiente es de tipo entero
			d	la variable correspondiente es de tipo double
			s	la variable correspondiente es de tipo string
			b	la variable correspondiente es un blob y se envía en paquetes
			*/
			
			if (!$result->bind_param("i", $this->_Usuario_ID)) {
			    echo "Binding parameters failed: (" . $result->errno . ") " . $result->error;
			}

		    /* fetch object array */
		    while ($obj = $result->fetch_object()) {
				$this->_Nombre_Usuario=$obj->Nombre_Usuario;
				$this->_Nombre=$obj->Nombre;
				$this->_Apellido=$obj->Apellido;
				$this->_Email=$obj->Email;
				$this->_FotoHash=$obj->FotoHash;
				$this->_Direccion=$obj->Direccion;
				$this->_Codigo_Postal=$obj->Codigo_Postal;
				$this->_Ciudad_ID=$obj->Ciudad_ID;
				$this->_Telefono=$obj->Telefono;
				$this->_Mail_Adicional=$obj->Mail_Adicional;
				$this->_Perfil_ID=$obj->Perfil_ID;
				$this->_Empresa_ID=$obj->Empresa_ID;
				$this->_Ultima_Actualizacion=$obj->Ultima_Actualizacion
				$this->_Ultima_Actividad=$obj->Ultima_Actividad
				$this->_Activo=$obj->Activo
				$this->_Eliminado=$obj->Eliminado
		    }
		
		    
		    $result->close();
		}
		
		/* cierro conexion */
		$conexion->close();
	
	}

}

?>