<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  
require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession($modoOP);
$permisos =$app->getPermisos();

$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Back_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Back').'css/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'js/',
                  \CORE\Controlador\Config::getPublic('Ruta_Back').'imagenes/');
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('OperadorLogueado',$app->getOperador());
$vm->assign('Permisos',$permisos);
                  
$Departamentos = $em->getRepository('Modelo\Departamento')->findAll();
$vm->assign('Departamentos',$Departamentos);

$TicketTipos = $em->getRepository('Modelo\TicketTipo')->findAll();
$vm->assign('TicketTipos',$TicketTipos);

$Prioridades = $em->getRepository('Modelo\Prioridad')->findAll();
$vm->assign('Prioridades',$Prioridades);

$Estados = $em->getRepository('Modelo\TicketEstado')->findAll();
$vm->assign('TicketEstados',$Estados);

$SLAs = $em->getRepository('Modelo\Sla')->findAll();
$vm->assign('SLAs',$SLAs);

//TODO: los campos custom, deberán cargarse por ajax, al seleccionar el departamento o cambiarlo.
$CamposCustoms = $em->getRepository('Modelo\TicketCustomFields')->findAll();
$vm->assign('TicketCustomFields',$CamposCustoms);

// TODO: los operadores deberían cargarse por ajax al cambiar de departamento, asi permite seleccionar los que tiene visibilidad ese departamento.
$Operadores = $em->getRepository('Modelo\Operador')->findAll();
$vm->assign('Operadores',$Operadores);
    


switch(strtolower($_POST["accion"])){
  case ("nuevo"):default:
    if (!$permisos->verificarPermiso("ticket_crear")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tickets");
    } 
   $vm->display('ticket.tpl');
    break;
  case ("ver"):
    if (!$permisos->verificarPermiso("ticket_ver")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tickets");
    } else{ 
      $_SESSION['LastTicketID']=$_POST["ticketId"][0];
      $ordenamiento_mensajes = $em->getRepository('Modelo\ConfiguracionGlobal')->find('ordenamiento_mensajes');
      $Ticket = $em->getRepository('Modelo\Ticket')->find($_POST["ticketId"][0]);
      $Mensajes = $em->getRepository('Modelo\Mensaje')->findBy(array("ticket"=>$_POST["ticketId"][0]),
                                                              array('fecha' => $ordenamiento_mensajes->getValor()));
      $vm->assign('Ticket',$Ticket); 
      $vm->assign('Mensajes',$Mensajes);
      $vm->display('ticketVista.tpl');
    }
    break;
  case ("borrar"):
    if (!$permisos->verificarPermiso("ticket_borrar")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
      $permisos->redirigir("/operador.php?modulo=tickets");
    } else{
    //No es correcto borrar tickes de la BD, se deshabilita esta función.
    /**$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
    foreach ($_POST['ticketId'] as $departamento) {
      $em->remove($em->getRepository('Modelo\Ticket')->find($departamento));
    }
    $em->flush();
    */
      header("location:/operador.php?modulo=tickets");
    }
    break;
  
}

