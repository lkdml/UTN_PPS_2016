<?php

class Empresa {
 
    private $_Empresa_ID;
    private $_Razon_Social;
    private $_Pais;
    private $_Direccion;
    private $_Ciudad;
    private $_Codigo_Postal;
    private $_Telefono;
    private $_Web;
    private $_Ultima_Actualizacion;
    private $_Sla_Plan_ID;
    private $_Perfil_Default_ID;
    private $_Anuncios;
    

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
	
		private function Obtener_Empresa($Empresa_ID)
	{
		//Tener lista la conexion para ver este tema
		$conexion=ConexionComando::Obtener_Instancia();
		$query="Select Razon_Social
		                ,Pais
		                ,Direccion
		                ,Ciudad
		                ,Codigo_Postal
		                ,Telefono
		                ,Web
		                ,Ultima_Actualizacion
		                ,SLA_Plan_ID
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
			
			if (!$result->bind_param("i", $this->$Empresa_ID)) {
			    echo "Binding parameters failed: (" . $result->errno . ") " . $result->error;
			}

		    /* fetch object array */
		    while ($obj = $result->fetch_object()) {
		    	$this->_Empresa_ID=$Empresa_ID;
				$this->_Razon_Social=$obj->Razon_Social;
				$this->_Pais=$obj->Pais;
				$this->_Direccion=$obj->Direccion;
				$this->_Ciudad=$obj->Ciudad;
				$this->_Codigo_Postal=$obj->Codigo_Postal;
				$this->_Telefono=$obj->Telefono;
				$this->_Web=$obj->Web;
				$this->_Ultima_Actualizacion=$obj->Ultima_Actualizacion;
				$this->_SLA_Plan_ID=$obj->SLA_Plan_ID;
				$this->_Perfil_Default_ID=$obj->Perfil_Default_ID;
				
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
		$query="Insert into empresas (Razon_Social
						,Pais
						,Direccion
						,Ciudad
						,Codigo_Postal
						,Telefono
						,Web
						,SLA_Plan_ID
						,Perfil_Default_ID)
					Values(?,?,?,?,?,?,?,?,?)";
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
				$result->bind_param("s", $this->_Razon_Social);
				$result->bind_param("s", $this->_Pais);
				$result->bind_param("s", $this->_Direccion);
				$result->bind_param("s", $this->_Ciudad);
				$result->bind_param("s", $this->_Codigo_Postal);
				$result->bind_param("s", $this->_Telefono);
				$result->bind_param("s", $this->_Web);
				$result->bind_param("i", $this->_SLA_Plan_ID);
				$result->bind_param("i", $this->_Perfil_Default_ID);
		
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
		$query="Delete from empresas where Empresa_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("i", $this->_Empresa_ID);
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
		$query="Update usuarios set 
						Razon_Social=?
						,Pais=?
						,Direccion=?
						,Ciudad=?
						,Codigo_Postal=?
						,Telefono=?
						,Web=?
						,SLA_Plan_ID=?
						,Perfil_Default_ID=?
						,Ultima_Actualizacion=GETDATE()
					where Empresa_ID=?";
		if ($result = $conexion->RetornarConsulta($query)) {
		
			try
			{
				$result->bind_param("s", $this->_Razon_Social);
				$result->bind_param("s", $this->_Pais);
				$result->bind_param("s", $this->_Direccion);
				$result->bind_param("s", $this->_Ciudad);
				$result->bind_param("s", $this->_Codigo_Postal);
				$result->bind_param("s", $this->_Telefono);
				$result->bind_param("s", $this->_Web);
				$result->bind_param("i", $this->_Sla_Plan_ID);
				$result->bind_param("i", $this->_Perfil_Default_ID);
				$result->bind_param("i", $this->_Empresa_ID);
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