<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 
require_once($_SERVER["DOCUMENT_ROOT"].'/bootstrap_orm.php'); 
/**
 * Valido que el operador esté con la session habilitadas
 */
use \CORE\Controlador\Aplicacion;
Aplicacion::startSession(true);

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();

if (isset($_GET['Departamento'])){
    $dpto =  $em->getRepository('Modelo\Departamento')->find($_GET["Departamento"]);
    $departamento = setear($dpto,$em);
    $em->persist($departamento);
    $em->flush();
} else {
    $departamento = setear(new Operador(),$em);
    $em->persist($departamento);
    $em->flush();
}


function setear(Departamento $departamento,$em){
    $departamento->setNombre($_POST["nombre"]);
    $departamento->setDescripcion($_POST["descripcion"]);
    $departamento->setPadreDeptoId($_POST["idDeptoPadre"]);
    $departamento->setVisibilidadUsuario($_POST["visibilidadUsuario"]);
    $departamento->setOrden($_POST["orden"]);
    if (isset($_POST['operadorDefault'])){
        $departamento->setOperadorDefaultId($em->find('Modelo\Operador',$_POST['operadorDefault']));
    }
    foreach ($departamento->getOperador() as $operador){
        $departamento->removeDepartamento($operador);
    }
    if (isset($_POST['operadoresSelecionados'])){
        foreach ($_POST['operadoresSelecionados'] as $idOperador){
            $Operador = $em->find('Modelo\Operador',$idOperador);
            if (!is_null($Operador)){
                $departamento->addOperador($Operador);
            }
        }
    }
    return $departamento;
}

header("location:/operador.php?modulo=departamentos");

?>