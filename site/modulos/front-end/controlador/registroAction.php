<?php
  /*
    * @Descripcion:    login Action
    *
    * @Package:        CORE
    * @Autor:          lkdml
    * @Version:        1.0
    * 
    */
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php');

use \Modelo\Usuario as Usuario;
use \Modelo\Empresa;
//TODO esto es solo para probar
if (!is_null($_POST["Email"])){
    $usuario = new Usuario();
    $usuario->setNombre_Usuario($_POST["Nombre"].' '.$_POST["Apellido"]);
    $usuario->setNombre($_POST["Nombre"]);
    $usuario->setApellido($_POST["Apellido"]);
    $usuario->setClave($_POST["Clave1"]);
    $usuario->setEmail($_POST["Email"]);
}
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

$empresa = new Empresa();
$empresa->setRazon_Social('No vinculado');
//$em->persist($empresa);
$em->persist($usuario);
echo "resultado de em:".$em->flush();

echo "Se creo el usuario ".$usuario->getNombre_Usuario() . " con el ID:" .$usuario->getUsuario_ID().' en la empresa'. $empresa->getRazon_Social();
/**
        header("location:../home.php");
    } else {
        header("location:../login.php");
    }

    */
?>
