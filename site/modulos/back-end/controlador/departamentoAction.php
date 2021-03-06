<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);
$app = Aplicacion::getInstancia();
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

use \Modelo\Departamento as Departamento;
use \Modelo\Operador as Operador;
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['Departamento'])){
    if (!$permisos->verificarPermiso("departamentos_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $dpto =  $em->getRepository('Modelo\Departamento')->find($_GET["Departamento"]);
        $departamento = setear($dpto,$em);
        $em->persist($departamento);
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("departamentos_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $departamento = setear(new Departamento(),$em);
        $em->persist($departamento);
        $em->flush();
    }
}


function setear(Departamento $departamento,$em){
    $departamento->setNombre($_POST["nombre"]);
    $departamento->setDescripcion($_POST["descripcion"]);
    $departamento->setPadreDeptoId($_POST["idDeptoPadre"]);
    if (isset($_POST["visibilidadUsuario"]))
    {
        $departamento->setVisibilidadUsuario($_POST["visibilidadUsuario"]);
    } else {
        $departamento->setVisibilidadUsuario(0);
    }
    $departamento->setOrden($_POST["orden"]);
    if ($_POST['operadorDefault']!= '-1'){
        $departamento->setOperadorDefaultId($em->find('Modelo\Operador',$_POST['operadorDefault']));
    }
    foreach ($departamento->getOperador() as $operador){
        $operador->removeDepartamento($departamento);
    }
    if (isset($_POST['operadores_Asignados'])){
        foreach ($_POST['operadores_Asignados'] as $idOperador){
            $Operador = $em->find('Modelo\Operador',$idOperador);
            if (!is_null($Operador)){
                $Operador->addDepartamento($departamento);
            }
        }
    }
    return $departamento;
}

header("location:/operador.php?modulo=departamentos");

?>