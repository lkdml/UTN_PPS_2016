<?php
namespace Modelo;
require_once($_SERVER["DOCUMENT_ROOT"].'/core/controlador/AutoLoaderClass.php');


class Usuario {
 	
 	private $_Usuario_ID;
	private $_Nombre_Usuario;
	private $_Clave;
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
	
	private function Obtener_Usuario($Usuario_ID)
	{
		//Tener lista la conexion para ver este tema
		$conexion=\CORE\Controlador\ConexionComando::Obtener_Instancia();
		$query="Select Nombre_Usuario
						,Nombre
						,Apellido
						,Clave
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
			
			if (!$result->bind_param("i", $this->$Usuario_ID)) {
			    echo "Binding parameters failed: (" . $result->errno . ") " . $result->error;
			}

		    /* fetch object array */
		    while ($obj = $result->fetch_object()) {
		    	$this->_Usuario_ID=$Usuario_ID;
				$this->_Nombre_Usuario=$obj->Nombre_Usuario;
				$this->_Nombre=$obj->Nombre;
				$this->_Apellido=$obj->Apellido;
				$this->_Clave=$obj->Clave;
				$this->_Email=$obj->Email;
				$this->_FotoHash=$obj->FotoHash;
				$this->_Direccion=$obj->Direccion;
				$this->_Codigo_Postal=$obj->Codigo_Postal;
				$this->_Ciudad_ID=$obj->Ciudad_ID;
				$this->_Telefono=$obj->Telefono;
				$this->_Mail_Adicional=$obj->Mail_Adicional;
				$this->_Perfil_ID=$obj->Perfil_ID;
				$this->_Empresa_ID=$obj->Empresa_ID;
				$this->_Ultima_Actualizacion=$obj->Ultima_Actualizacion;
				$this->_Ultima_Actividad=$obj->Ultima_Actividad;
				$this->_Activo=$obj->Activo;
				$this->_Eliminado=$obj->Eliminado;
		    }
		
		    
		    $result->close();
		}
		
		/* cierro conexion */
		$conexion->close();
	
	}
	
	private function Alta()
	{
		//Tener lista la conexion para ver este tema
		$conexion=\CORE\Controlador\ConexionComando::Obtener_Instancia();
		$query="Insert into usuarios (Nombre_Usuario
						,Nombre
						,Apellido
						,Clave
						,Email
						,FotoHash
						,Direccion
						,Codigo_Postal
						,Ciudad_ID
						,Telefono
						,Mail_Adicional
						,Perfil_ID
						,Empresa_ID
						,Activo
						,Eliminado)
					Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		if ($result = $conexion->RetornarConsulta($query)) {
			
			/*
			BIND PARAMETROS
			i	la variable correspondiente es de tipo entero
			d	la variable correspondiente es de tipo double
			s	la variable correspondiente es de tipo string
			b	la variable correspondiente es un blob y se envía en paquetes
			*/
			try
			{
				$result->bind_param("s", $this->_Nombre_Usuario);
				$result->bind_param("s", $this->_Nombre);
				$result->bind_param("s", $this->_Apellido);
				$result->bind_param("s", $this->_Clave);
				$result->bind_param("s", $this->_Email);
				$result->bind_param("i", $this->_FotoHash);
				$result->bind_param("s", $this->_Direccion);
				$result->bind_param("s", $this->_Codigo_Postal);
				$result->bind_param("i", $this->_Ciudad_ID);
				$result->bind_param("s", $this->_Telefono);
				$result->bind_param("s", $this->_Mail_Adicional);
				$result->bind_param("i", $this->_Perfil_ID);
				$result->bind_param("i", $this->_Empresa_ID);
				$result->bind_param("i", $this->_Activo);	
				$result->bind_param("i", $this->_Eliminado);
			}
			catch(Exception $e)
			{
				print "Error!: " . $e->getMessage(); 
			}
		
		}
		$result->execute();
	}
	
	private function Baja()
	{
		$conexion=\CORE\Controlador\ConexionComando::Obtener_Instancia();
		$query="Update usuarios set Activo=0,Eliminado=1 where Usuario_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Usuario_ID);
			}
			catch(Exception $e)
			{
				print "Error!: " . $e->getMessage(); 
			}
		
		}
		$result->execute();
	}
	
	private function Modificar()
	{
		$conexion=\CORE\Controlador\ConexionComando::Obtener_Instancia();
		$query="Update usuarios set 
						Nombre=?
						,Apellido=?
						,Clave=?
						,FotoHash=?
						,Direccion=?
						,Codigo_Postal=?
						,Ciudad_ID=?
						,Telefono=?
						,Mail_Adicional=?
						,Ultima_Actualizacion=GETDATE()
					where Usuario_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("s", $this->_Nombre);
				$result->bind_param("s", $this->_Apellido);
				$result->bind_param("s", $this->_Clave);
				$result->bind_param("i", $this->_FotoHash);
				$result->bind_param("s", $this->_Direccion);
				$result->bind_param("s", $this->_Codigo_Postal);
				$result->bind_param("i", $this->_Ciudad_ID);
				$result->bind_param("s", $this->_Telefono);
				$result->bind_param("s", $this->_Mail_Adicional);
				$result->bind_param("i", $this->_Usuario_ID);
			}
			catch(Exception $e)
			{
				print "Error!: " . $e->getMessage(); 
			}
		
		}
		$result->execute();
	}
	
		public function ListarUsuarios()
	{
		$conexion=\CORE\Controlador\ConexionComando::Obtener_Instancia();
		$query="Select * from Configuracion_Global";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
			
				
			}
			catch(Exception $e)
			{
				print "Error!: " . $e->getMessage(); 
			}
		
		}
			var_dump($result);die;
		$result->execute();
	}
	
	public function autoLoad($clase){
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }
      return false;
	} 

}

?>