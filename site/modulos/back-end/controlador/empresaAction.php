<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\Empresa as Empresa;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


if (isset($_GET['empresaId'])){
    $Empresa =  $em->getRepository('Modelo\Empresa')->find($_GET["empresaId"]);
    $em->persist(setear($Empresa,$em));
    $em->flush();
} else {
    $Empresa = setear(new Empresa(),$em);
    $em->persist($Empresa);
    $em->flush();
}

echo '<pre>' . var_dump($_POST) . '</pre>';

function setear(Empresa $empresa,$em){
    
    $empresa->setRazonSocial($_POST["razonsocial"]);
    $empresa->setPais($_POST["pais"]);
    $empresa->setDireccion($_POST["direccion"]);
    if (isset($_POST["ciudad"]))
    {
       $empresa->setCiudad($_POST["ciudad"]);
    }
    if (isset($_POST["codigoPostal"]))
    {
       $empresa->setCodigoPostal($_POST["codigoPostal"]);
    }
    if (isset($_POST["telefono"]))
    {
       $empresa->setTelefono($_POST["telefono"]);
    }
    if (isset($_POST["web"]))
    {
       $empresa->setWeb($_POST["web"]);
    }
    $empresa->setUltimaActualizacion(new \DateTime("now"));
    
    return $empresa;
}


header("location:/operador.php?modulo=empresas");

?>