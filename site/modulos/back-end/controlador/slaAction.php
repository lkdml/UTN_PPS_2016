<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 


use \CORE\Controlador\Aplicacion;
//use \Modelo\Sla as Sla;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\Sla as Sla;

$app = Aplicacion::getInstancia();
$app->startSession(true);
$permisos =$app->getPermisos();

$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();


if (isset($_GET['slaId'])){
    if (!$permisos->verificarPermiso("sla_editar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Sla =  $em->getRepository('Modelo\Sla')->find($_GET["slaId"]);
        var_dump($Sla);die;
        $em->persist(setear($Sla,$em));
        $em->flush();
    }
} else {
    if (!$permisos->verificarPermiso("sla_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $Sla = setear(new Sla(),$em);
        $condicionesDelSLA = procesarPostSLA($Sla,$em);
        $em->persist($Sla);
        foreach ($condicionesDelSLA as $condicionSLA) {
            $em->persist($condicionSLA);
        }
        $em->flush();
    }
}


function setear(Sla $sla,$em){
    $sla->setNombre($_POST["nombre"]);
    if (isset($_POST["descripcion"]))
    {
        $sla->setDescripcion($_POST["descripcion"]); 
    }
     if (isset($_POST["estado"]))
    {
        $sla->setEstado(1);
    } else {
        $sla->setEstado(0);
    }
    return $sla;
}

function setearSlaSlasCondiciones(Sla $sla, SlaCondicion $slaCondicion, SlaParametro $slaParametro, $valor, $em){
    $SlaSlaCondicion = new SlaSlasCondiciones();
    $SlaSlaCondicion->setSla($sla);
    $SlaSlaCondicion->setSlaCondicion($slaCondicion);
    $SlaSlaCondicion->setSlaParametro($slaParametro);
    $SlaSlaCondicion->setValor($valor);
    return $SlaSlaCondicion;
}

function procesarPostSLA(Sla $sla,$em){
   $arraySlaSlasCondiciones = array();
    foreach ($_POST['preCond'] as $key=>$precondId) {
       if ($precondId != '-1') {
           $SlaCondicion =  $em->getRepository('Modelo\SlaCondicion')->find($_POST['preCond'][$key]);
           $SlaParametro =  $em->getRepository('Modelo\SlaParametro')->find($_POST['preParam'][$key]);
           $valor = json_encode($_POST['pre-valor-'][$key]);
           $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
           array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);    
       }
    }
    foreach ($_POST['venceCond'] as $key=>$venceCond) {
       if ($venceCond != '-1') {
           $SlaCondicion =  $em->getRepository('Modelo\SlaCondicion')->find($_POST['venceCond'][$key]);
           $SlaParametro =  $em->getRepository('Modelo\SlaParametro')->find($_POST['venceParam'][$key]);
           $valor = json_encode($_POST['vence-valor-'][$key]);
           $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
           array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);   
       }
    }
    foreach ($_POST['postCond'] as $key=>$venceCond) {
       if ($venceCond != '-1') {
            $SlaCondicion =  $em->getRepository('Modelo\SlaCondicion')->find($_POST['postCond'][$key]);
            $SlaParametro =  $em->getRepository('Modelo\SlaParametro')->find($_POST['postParam'][$key]);;
            $valor = json_encode($_POST['vence-valor-'][$key]);
            $nuevaCondicionSLA = setearSlaSlasCondiciones($sla,$SlaCondicion,$SlaParametro,$valor,$em);
            array_push($arraySlaSlasCondiciones,$nuevaCondicionSLA);   
       }
    }
    return $arraySlaSlasCondiciones;
}


header("location:/operador.php?modulo=slas");

?>