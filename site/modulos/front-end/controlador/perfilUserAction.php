<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');


use \Modelo\Usuario as Usuario;
use \CORE\Controlador\FileManager as FileManager;
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
Aplicacion::startSession(true);


$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


   
if (isset($_GET['Usuario'])){
    $getUsuario=  $em->getRepository('Modelo\Usuario')->find($_GET["Usuario"]);
    if (($_GET['actualiza']=='clave')){
        if (($getOperador->verificarClave($_POST["clave"])) && ($_POST["nuevaclave1"]==$_POST["nuevaclave2"])){
            $claveNueva = $getUsuario->encriptarClave($_POST["nuevaclave1"]);
            $getUsuario->setClave($claveNueva);
            $em->persist($getUsuario);
            $em->flush();
            $usActualizado=$em->getRepository('Modelo\Usuario')->find($getUsuario->getUsuarioId());
            $app->setUsuario($usActualizado);
            $app->guardarUsuarioEnSession();
        }
    } else if (($_GET['actualiza']=='foto')){
        $archivo = new FileManager($em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_imagenes")->getValor(),'uploads/avatars/');
        $archivo->guardarArchivosDePost($_FILES);
        //TODO faltan agregar al TPL
        $getUsuario->setFotoHash($archivo->getArrayNombres()[0]['hashName']);
        $em->persist($getUsuario);
        $em->flush();
        if ($getUsuario->getUsuarioId()==$app->getUsuario()->getUsuarioId()){
            $app->setUsuario($getUsuario);
            $app->guardarUsuarioEnSession();
        }
    } else {
        $Usuario = setearUsuario($getUsuario,$em);
        $em->persist($Usuario);
        $em->flush();
        $app->setUsuario($Usuario);
        $app->guardarUsuarioEnSession();
    }

}

function setearUsuario(Usuario $user,$em){
    $user->setNombre($_POST["nombre"]);
    $user->setApellido($_POST["apellido"]);
    $user->setDireccion($_POST["direccion"]);
    $user->setCodigoPostal($_POST["codigoPostal"]);
    
    $user->setCiudad($_POST["ciudad"]);
    $user->setTelefono($_POST["telefono"]);
    $user->setMailAdicional($_POST["mailAdicional"]);
    $user->setUltimaActualizacion(new \DateTime("now"));
    $user->setUltimaActividad(new \DateTime("now"));
    $user->setActivo(true);
    $user->setEliminado(false);
    return $user;
}

header("location:/index.php?modulo=home");

?>