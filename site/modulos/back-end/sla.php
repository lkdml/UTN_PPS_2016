<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
use \CORE\Controlador\CustomField as CustomField;
use \CORE\Controlador\Sla as CoreSla;
use \Modelo\SlaSlasCondiciones as SlaSlasCondiciones;
use \Modelo\SlaParametro as SlaParametro;
use \Modelo\SlaCondicion as SlaCondicion;
use \Modelo\Sla as Sla;
use \CORE\Controlador\Entity_Repository as Entity_Repository;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
    $vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                      \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                      \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
    $vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
    $vm->assign('OperadorLogueado',$app->getOperador());
    $vm->assign('Permisos',$permisos);

if (isset($_POST['datosAjax'])){
  switch ($_POST['datos']){
    case 'condiciones':
      $iteraciones = $_POST['iteracion'];
      $tipo = $_POST['tipo'];
      $coreSla = new CoreSla();
      $coreSla->setVm($vm);
      $condiciones = $coreSla->tplTodoFromCondicionesExitentesDelTipo($tipo,false,$iteraciones);
      echo($condiciones);die;
      break;
    case 'valoresCondiciones':
      $iteraciones = $_POST['iteracion'];
      $tipo = $_POST['tipo'];
      $condicionId = $_POST['condicionId'];
      $coreSla = new CoreSla();
      $coreSla->setVm($vm);
      $condiciones = $coreSla->tplTodoFromCondicionesExitentesDelTipo($tipo,false,$iteraciones,$condicionId);
      echo($condiciones);die;
      break;
    default:
        die;
        break;
  }
    
    
} else {
    
    switch(strtolower($_POST["accion"])){
      case ("nuevo"):default:
        if (!$permisos->verificarPermiso("sla_crear")){
          $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
          $app->setError($error);
          $app->guardarErrorEnSession();
          $permisos->redirigir("/operador.php?modulo=slas");
        } 
        break;
      case ("editar"):
        if (!$permisos->verificarPermiso("sla_ver")){
          $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
          $app->setError($error);
          $app->guardarErrorEnSession();
          $permisos->redirigir("/operador.php?modulo=slas");
        } else{
          $coreSla = new CoreSla();
          $coreSla->setVm($vm);
          $coreSla->setModeloSlaFromSlaId($_POST["slaId"][0]);
          $contenidoPre = $coreSla->tplTodoFromCondicionesExitentesDelTipo('pre',true);
          $contenidoVence = $coreSla->tplTodoFromCondicionesExitentesDelTipo('vencimiento',true);
          $contenidoPost = $coreSla->tplTodoFromCondicionesExitentesDelTipo('post',true);
          $vm->assign('Sla',$coreSla->getModeloSla());
          $vm->assign('contenidoPre',$contenidoPre);
          $vm->assign('contenidoVence',$contenidoVence);
          $vm->assign('contenidoPost',$contenidoPost);
        }
        break;
      case ("borrar"):
        if (!$permisos->verificarPermiso("sla_eliminar")){
          $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
          $app->setError($error);
          $app->guardarErrorEnSession();
          $permisos->redirigir("/operador.php?modulo=slas");
        } else{
          $em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
          foreach ($_POST['slaId'] as $sla) {
            $em->remove($em->getRepository('Modelo\Sla')->find($sla));
          }
          $em->flush();
          /*foreach ($_POST['slaId'] as $sla) {
            $SlaUpdatear =  $em->getRepository('Modelo\Sla')->find($sla);
            $SlaUpdatear->setEliminado(true);
            $SlaUpdatear->setEstado(0);
            $em->persist($SlaUpdatear);
          }
          $em->flush();*/
          
          header("location:/operador.php?modulo=slas");
        }
        break;
       
    }
    
    
    
    $vm->display('sla.tpl');
  }



