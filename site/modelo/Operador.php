<?php

class Operador {
 	
 	private $_Perfil_ID;
 	private $_Nombre;
 	private $_Apellido;
 	private $_Nombre_Usuario;
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

}

?>