<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 


use \CORE\Controlador\Aplicacion;
use \Modelo\Usuario as Usuario;

Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();
// TODO antes de generar el usuario, debo verificar que el username y el mail no existan previamente. (o bien manejar el error que devolverá el sql si eso pasara.)

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['usuarioId'])){
    if (!$permisos->verificarPermiso("usuarios_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Usuario =  $em->getRepository('Modelo\Usuario')->find($_GET["usuarioId"]);
        $em->persist(setear($Usuario,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("usuarios_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Usuario = setear(new Usuario(),$em);
        $em->persist($Usuario);
        $em->flush();
    }
}


function setear(Usuario $user,$em){
    $user->setNombre($_POST["nombre"]);
    $user->setApellido($_POST["apellido"]);
    $user->encriptarClave($_POST["clave"]);
    $user->setEmail($_POST["email"]);
    
    if (isset($_POST["fotoHash"]))
    {
        $user->setFotoHash($_POST["fotoHash"]);
    }
    if (isset($_POST["direccion"]))
    {
        $user->setDireccion($_POST["direccion"]);
    }
    if (isset($_POST["codigoPostal"]))
    {
        $user->setCodigoPostal($_POST["codigoPostal"]);
    }
    if (isset($_POST["ciudad"]))
    {
        $user->setCiudad($_POST["ciudad"]);
    }
    if (isset($_POST["telefono"]))
    {
        $user->setTelefono($_POST["telefono"]);
    }
    if (isset($_POST["emailadicional"]))
    {
        $user->setMailAdicional($_POST["emailadicional"]);
    }
    
    $user->setUltimaActualizacion(new \DateTime("now"));
    $user->setUltimaActividad(new \DateTime("now"));
    $user->setActivo(true);
    $user->setEliminado(false);
    
    $user->setEmpresa($em->getRepository('Modelo\Empresa')->find($_POST["empresa"]));
    
    
    return $user;
}



header("location:/operador.php?modulo=usuarios");

?>