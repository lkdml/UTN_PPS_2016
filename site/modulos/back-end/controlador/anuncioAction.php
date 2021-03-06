<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\Anuncio as Anuncio;

$app = Aplicacion::getInstancia();
$app->startSession(true);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$op=$app->getOperador();

$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    
if (isset($_GET['anuncioId'])){
    if (!$permisos->verificarPermiso("anuncios_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Anuncio =  $em->getRepository('Modelo\Anuncio')->find($_GET["anuncioId"]);
        $em->persist(setear($Anuncio,$em,$op));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("anuncios_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Anuncio = setear(new Anuncio(),$em,$op);
        $em->persist($Anuncio);
        $em->flush();
    }
}

function setear(Anuncio $anuncio,$em,$op){
    
    $anuncio->setTitulo($_POST["titulo"]);
    $anuncio->setContenido($_POST["contenido"]);
    if (isset($_POST["estado"]))
    {
       $anuncio->setEstado(true);
    } else {
        $anuncio->setEstado(false);
    }
    $anuncio->setFechaCreacion(new \DateTime("now"));
     if (!empty($_POST["fechaFinPublicacion"]))
    {
        $anuncio->setFechaFinPublicacion(DateTime::createFromFormat('m/d/Y', $_POST['fechaFinPublicacion']));
    } else {
        $anuncio->setFechaFinPublicacion(null);
    }
   
    $anuncio->setCategoria($em->find('Modelo\CategoriaAnuncios',$_POST['categoria']));
    
    
    $anuncio->setOperadorId($op->getOperadorId());
    
    foreach ($anuncio->getEmpresa() as $empresa){
        $empresa->removeAnuncio($anuncio);
    }
    if (isset($_POST['empresas_Asignadas'])){
        foreach ($_POST['empresas_Asignadas'] as $idEmpresa){
            $Empresa = $em->find('Modelo\Empresa',$idEmpresa);
            if (!is_null($Empresa)){
                $Empresa->addAnuncio($anuncio);
            }
        }
    }
    
    
    return $anuncio;
}


header("location:/operador.php?modulo=anuncios");

?>