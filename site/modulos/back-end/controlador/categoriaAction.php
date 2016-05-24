<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\CategoriaAnuncios as Categoria;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['categoriaId'])){
    $Categoria =  $em->getRepository('Modelo\CategoriaAnuncios')->find($_GET["categoriaId"]);
    $em->persist(setear($Categoria,$em));
    $em->flush();
} else {
    $Categoria = setear(new Categoria(),$em);
    $em->persist($Categoria);
    $em->flush();
}


function setear(Categoria $categoria,$em){
    $categoria->setNombre($_POST["nombre"]);
    $categoria->setIcono($_POST["icono"]);
    
    return $categoria;
}


header("location:/operador.php?modulo=categorias");

?>