<?php

class Anuncio {
 	
 	private $_Anuncio_ID;
	private $_Empresa_ID;
	private $_Categoria_ID;
	private $_Titulo;
	private $_Contenido;
	private $_Fecha_Creacion;
	private $_Estado;
	private $_Fecha_Fin_Publicacion;
	private $_Operador_ID;

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
	
		private function Obtener_Anuncio($Anuncio_ID)
	{
		//Tener lista la conexion para ver este tema
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Select Empresa_ID
		                ,Categoria_ID
		                ,Titulo
		                ,Contenido
		                ,Fecha_Creacion
		                ,Estado
		                ,Fecha_Fin_Publicacion
		                ,Operador_ID
				from empresas
				where Empresa_ID=?";
		
		/*VER DE HACERLO EN TXT LA CONSULTA Y LEVANTARLO DESDE RESOURCES*/
				
		if ($result = $conexion->RetornarConsulta($query)) {
			
			/*
			BIND PARAMETROS
			i	la variable correspondiente es de tipo entero
			d	la variable correspondiente es de tipo double
			s	la variable correspondiente es de tipo string
			b	la variable correspondiente es un blob y se envía en paquetes
			*/
			
			if (!$result->bind_param("i", $this->$Anuncio_ID)) {
			    echo "Binding parameters failed: (" . $result->errno . ") " . $result->error;
			}

		    /* fetch object array */
		    while ($obj = $result->fetch_object()) {
		    	$this->_Anuncio_ID=$Anuncio_ID;
				$this->_Empresa_ID=$obj->Empresa_ID;
				$this->_Categoria_ID=$obj->Categoria_ID;
				$this->_Titulo=$obj->Titulo;
				$this->_Contenido=$obj->Contenido;
				$this->_Fecha_Creacion=$obj->Fecha_Creacion;
				$this->_Estado=$obj->Estado;
				$this->_Fecha_Fin_Publicacion=$obj->Fecha_Fin_Publicacion;
				$this->_Operador_ID=$obj->Operador_ID;
			
				
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
		$query="Insert into anuncios (Empresa_ID
						,Categoria_ID
						,Titulo
						,Contenido
						,Fecha_Creacion
						,Estado
						,Fecha_Fin_Publicacion
						,Operador_ID)
					Values(?,?,?,?,?,?,?,?)";
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
				$result->bind_param("i", $this->_Empresa_ID);
				$result->bind_param("i", $this->_Categoria_ID);
				$result->bind_param("s", $this->_Titulo);
				$result->bind_param("s", $this->_Contenido);
				$result->bind_param("s", $this->_Fecha_Creacion);
				$result->bind_param("i", $this->_Estado);
				$result->bind_param("s", $this->_Fecha_Fin_Publicacion);
				$result->bind_param("i", $this->_Operador_ID);

		
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
		$query="Update anuncios set Estado=0 where Anuncio_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Anuncio_ID);
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
		$query="Update anuncios set 
						Empresa_ID=?
						,Categoria_ID=?
						,Titulo=?
						,Contenido=?
						,Operador_ID=?
					where Anuncio_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Empresa_ID);
				$result->bind_param("i", $this->_Categoria_ID);
				$result->bind_param("s", $this->_Titulo);
				$result->bind_param("s", $this->_Contenido);
				$result->bind_param("i", $this->_Operador_ID);
				$result->bind_param("i", $this->_Anuncio_ID);
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