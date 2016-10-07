<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php'); 

use \CORE\Controlador\Aplicacion;
use \Modelo\ConfiguracionGlobal as Config;
use \CORE\Controlador\FileManager as FileManager;

$app = Aplicacion::getInstancia();
$app->startSession(true);
$permisos =$app->getPermisos();
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$op=$app->getOperador();

/*
insert into configuracion_global values ("mail_remitente","T.M.H.");
insert into configuracion_global values ("directorio_Uploads","");

insert into configuracion_global values ("empresa_url","http://ide.c9.io/lkdml/t-m-h");
insert into configuracion_global values ("empresa_SSL_front",0);
insert into configuracion_global values ("empresa_SSL_back",0);

insert into configuracion_global values ("usuarios_terminos","terminos y condiciones a desarrollar");
insert into configuracion_global values ("usuarios_permitirRegistro",0);
*/

if (!$permisos->verificarPermiso("general_parametros")){
      $error = new \CORE\Controlador\Error(1,"Permisos","Ud. no cuenta con los permisos para esta acción.","8002",basename(__FILE__));
      $app->setError($error);
      $app->guardarErrorEnSession();
    }
else {
        var_dump($_POST);
        var_dump(isset($_FILES['imagenFront']));
        var_dump($_FILES);
        die;
        /*TAB WEB*/
        $nombreEmpresa = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_nombre");
        $nombreEmpresa->setValor($_POST['nombreEmpresa']);
        $em->persist($nombreEmpresa);
        
        $tituloEmpresa = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_titulo");
        $tituloEmpresa->setValor($_POST['textoPestana']);
        $em->persist($tituloEmpresa);
        
        $urlBase = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_ruta_base");
        $urlBase->setValor($_POST['urlBase']);
        $em->persist($urlBase);
        
        $ssl = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_url_ssl");
        if(isset($_POST['ssl']))
        {
            $ssl->setValor("true");
            $em->persist($ssl); 
        }
        else
        {
            $ssl->setValor("false");
            $em->persist($ssl); 
        }
        
        
        $imagenFront = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_logo");
        if (isset($_FILES['imagenFront']))
        {
            $archivo = new FileManager($em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_imagenes")->getValor(),'uploads/config/');
            $archivo->guardarArchivosDePost($_FILES['imagenFront']);
            $imagenFront->setValor($archivo->getArrayNombres()[0]['hashName']);
            $em->persist($imagenFront);
        }
       
        
        $iconoPestaña = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_icono");
        if (isset($_FILES['iconoPestana']))
        {
            $archivo = new FileManager($em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_imagenes")->getValor(),'uploads/config/');
            $archivo->guardarArchivosDePost($_FILES['iconoPestana']);
            $iconoPestaña->setValor($archivo->getArrayNombres()[0]['hashName']);
            $em->persist($iconoPestaña);
        }
        
        
        $modoMantenimiento = $em->getRepository('Modelo\ConfiguracionGlobal')->find("modo_mantenimiento");
        if(isset($_POST['modoMantenimiento']))
        {
            $modoMantenimiento->setValor("true");
            $em->persist($modoMantenimiento);  
        }
        else
        {
            $modoMantenimiento->setValor("false");
            $em->persist($modoMantenimiento);  
        }
        
        
        
        /*FIN TAB WEB*/
    
        /*TAB EMAIL*/
        $AutorizacionSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_SMTPAuth");
        if(isset($_POST['autenticacionSMTP']))
        {
            $AutorizacionSMTP->setValor("true");
            $em->persist($AutorizacionSMTP); 
        }
        else
        {
            $AutorizacionSMTP->setValor("false");
            $em->persist($AutorizacionSMTP);  
        }
        
        $emailUsuario = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Username");
        $emailUsuario->setValor($_POST['emailUsuario']);
        $em->persist($emailUsuario);
        
        $emailPassword = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Password");
        $emailPassword->setValor($_POST['emailPassword']);
        $em->persist($emailPassword);
        
        $EncripcionSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_SMTPSecure");
        $EncripcionSMTP->setValor($_POST['encripcionSMTP']);//-1 Ninguno, 1-SSL,2-TLS
        $em->persist($EncripcionSMTP);
        
        $hostSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Host");
        $hostSMTP->setValor($_POST['hostSMTP']);
        $em->persist($hostSMTP);
        
        $puertoSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Port");
        $puertoSMTP->setValor($_POST['puertoSMTP']);
        $em->persist($puertoSMTP);
        
        $emailDefault = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_mail");
        $emailDefault->setValor($_POST['emailDefault']);
        $em->persist($emailDefault);
        /*FIN TAB EMAIL*/
        
        /*TAB TICKET*/
        $ordenamientoMensajes = $em->getRepository('Modelo\ConfiguracionGlobal')->find("ordenamiento_mensajes");
        $ordenamientoMensajes->setValor($_POST['ordenamientoMensajes']);
        $em->persist($ordenamientoMensajes);
        
        $extensionesArchivos= $em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_archivos");
        foreach ($_POST['archivosPermitidos'] as $ext) {
            $extensiones=$extensiones.$ext.",";
        }
        $extensiones="[".substr($extensiones,0,strlen($extensiones)-1)."]";
        
        $extensionesArchivos->setValor($extensiones);
        $em->persist($extensionesArchivos);

        /*FIN TAB TICKET*/

        
        $em->flush();
    }



header("location:/operador.php?modulo=configuracionGeneral");

?>