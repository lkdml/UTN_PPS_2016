<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\CategoriaAnuncios as Categoria;
Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


if (isset($_GET['categoriaId'])){
    if (!$permisos->verificarPermiso("categorias_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Categoria =  $em->getRepository('Modelo\CategoriaAnuncios')->find($_GET["categoriaId"]);
        $em->persist(setear($Categoria,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("categorias_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Categoria = setear(new Categoria(),$em);
        $em->persist($Categoria);
        $em->flush();
    }
}

    
function setear(Categoria $categoria,$em){
    $categoria->setNombre($_POST["nombre"]);
    $categoria->setIcono($_POST["icono"]);
    
    return $categoria;
}


header("location:/operador.php?modulo=categorias");

?>