<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 


use \CORE\Controlador\Aplicacion;
//use \Modelo\Sla as Sla;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\Sla as Sla;
use \CORE\Controlador\Sla as CoreSla;

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
        $NuevoSla = new CoreSla();
        $NuevoSla->persistirSLAConPOST($_GET['slaId'],
                                      $_POST["nombre"],
                                      $_POST["descripcion"],
                                      $_POST["estado"],
                                      $_POST['pre'],
                                      $_POST['preParam'],
                                      $_POST['pre-valor'],
                                      $_POST['vencimiento'],
                                      $_POST['vencimientoParam'],
                                      $_POST['vencimiento-valor'],
                                      $_POST['post'],
                                      $_POST['postParam'],
                                      $_POST['post-valor']
                                      );
    }
} else {
    if (!$permisos->verificarPermiso("sla_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    } else {
        $NuevoSla = new CoreSla();
        $NuevoSla->persistirSLAConPOST(null,
                                      $_POST["nombre"],
                                      $_POST["descripcion"],
                                      $_POST["estado"],
                                      $_POST['pre'],
                                      $_POST['preParam'],
                                      $_POST['pre-valor'],
                                      $_POST['vencimiento'],
                                      $_POST['vencimientoParam'],
                                      $_POST['vencimiento-valor'],
                                      $_POST['post'],
                                      $_POST['postParam'],
                                      $_POST['post-valor']
                                      );
    }
}



header("location:/operador.php?modulo=slas");

?>