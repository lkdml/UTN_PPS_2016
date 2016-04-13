<?php

class Operador {
 	
 	private $_Operador_ID;
 	private $_Perfil_ID;
 	private $_Nombre;
 	private $_Apellido;
 	private $_Nombre_Usuario;
 	private $_Clave;
 	private $_Firma_Mensaje;
 	private $_Email;
 	private $_Celular;
 	private $_Ultima_Actualizacion;
 	private $_Ultima_Actividad;
 	private $_Activo;
 	private $_Deptos_Habilitados;
 	private $_Habilita_Notificaciones_Mail;
 	private $_Filtro_Ticket_ID;
 	private $_HashFoto;
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
	
	private function Obtener_Operador($Operador_ID)
	{
		//Tener lista la conexion para ver este tema
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Select Perfil_ID
						,Nombre
						,Apellido
						,Nombre_Usuario
						,Clave
						,Firma_Mensaje
						,Email
						,Celular
						,Ultima_Actualizacion
						,Ultima_Actividad
						,Activo
						,Deptos_Habilitados
						,Habilita_Notificaciones_Mail
						,Filtro_Ticket_ID
						,HashFoto
						,Eliminado
				from operadores
				where Operador_ID=?";
		
		/*VER DE HACERLO EN TXT LA CONSULTA Y LEVANTARLO DESDE RESOURCES*/
				
		if ($result = $conexion->RetornarConsulta($query)) {
			
			/*
			BIND PARAMETROS
			i	la variable correspondiente es de tipo entero
			d	la variable correspondiente es de tipo double
			s	la variable correspondiente es de tipo string
			b	la variable correspondiente es un blob y se envía en paquetes
			*/
			
			if (!$result->bind_param("i", $this->$Operador_ID)) {
			    echo "Binding parameters failed: (" . $result->errno . ") " . $result->error;
			}

		    /* fetch object array */
		    while ($obj = $result->fetch_object()) {
		    	$this->_Operador_ID=$Operador_ID;
				$this->_Perfil_ID=$obj->Perfil_ID;
				$this->_Nombre=$obj->Nombre;
				$this->_Apellido=$obj->Apellido;
				$this->_Nombre_Usuario=$obj->Nombre_Usuario;
				$this->_Clave=$obj->Clave;
				$this->_Firma_Mensaje=$obj->Firma_Mensaje;
				$this->_Email=$obj->Email;
				$this->_Celular=$obj->Celular;
				$this->_Ultima_Actualizacion=$obj->Ultima_Actualizacion;
				$this->_Ultima_Actividad=$obj->Ultima_Actividad;
				$this->_Activo=$obj->Activo;
				$this->_Deptos_Habilitados=$obj->Deptos_Habilitados;
				$this->_Habilita_Notificaciones_Mail=$obj->Habilita_Notificaciones_Mail;
				$this->_Filtro_Ticket_ID=$obj->Filtro_Ticket_ID;
				$this->_HashFoto=$obj->HashFoto;
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
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Insert into operadores (Perfil_ID
						,Nombre
						,Apellido
						,Nombre_Usuario
						,Clave
						,Firma_Mensaje
						,Email
						,Celular
						,Activo
						,Deptos_Habilitados
						,Habilita_Notificaciones_Mail
						,Filtro_Ticket_ID
						,HashFoto
						,Eliminado)
					Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
				$result->bind_param("i", $this->_Perfil_ID);
				$result->bind_param("s", $this->_Nombre);
				$result->bind_param("s", $this->_Apellido);
				$result->bind_param("s", $this->_Nombre_Usuario);
				$result->bind_param("s", $this->_Clave);
				$result->bind_param("s", $this->_Firma_Mensaje);
				$result->bind_param("s", $this->_Email);
				$result->bind_param("s", $this->_Celular);
				$result->bind_param("i", $this->_Activo);
				$result->bind_param("s", $this->_Deptos_Habilitados);
				$result->bind_param("i", $this->_Habilita_Notificaciones_Mail);
				$result->bind_param("i", $this->_Filtro_Ticket_ID);
				$result->bind_param("s", $this->_HashFoto);	
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
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Update operadores set Activo=0,Eliminado=1 where Operador_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Operador_ID);
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
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Update operadores set 
						Perfil_ID=?
						,Nombre=?
						,Apellido=?
						,Clave=?
						,Firma_Mensaje=?
						,Celular=?
						,Ultima_Actualizacion=GETDATE()
						,Deptos_Habilitados=?
						,Habilita_Notificaciones_Mail=?
						,Filtro_Ticket_ID=?
						,HashFoto=?
					where Operador_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Perfil_ID);
				$result->bind_param("s", $this->_Nombre);
				$result->bind_param("s", $this->_Apellido);
				$result->bind_param("s", $this->_Clave);
				$result->bind_param("s", $this->_Firma_Mensaje);
				$result->bind_param("s", $this->_Celular);
				$result->bind_param("s", $this->_Deptos_Habilitados);
				$result->bind_param("i", $this->_Habilita_Notificaciones_Mail);
				$result->bind_param("i", $this->_Filtro_Ticket_ID);
				$result->bind_param("i", $this->_HashFoto);
			}
			catch(Exception $e)
			{
				print "Error!: " . $e->getMessage(); 
			}
		
		}
		$result->execute();
	}



}

?>