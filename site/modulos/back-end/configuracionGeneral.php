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

$nombreEmpresa = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_nombre");
$vm->assign('NombreEmpresa',$nombreEmpresa->getValor());
$tituloEmpresa = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_titulo");
$vm->assign('TituloEmpresa',$tituloEmpresa->getValor());
$urlBase = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_ruta_base");
$vm->assign('UrlBaseEmpresa',$urlBase->getValor());
$ssl = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_url_ssl");
$vm->assign('Ssl',$ssl->getValor());
$imagenFront = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_logo");
$vm->assign('ImagenFront',$imagenFront->getValor());
$iconoPestaña = $em->getRepository('Modelo\ConfiguracionGlobal')->find("empresa_icono");
$vm->assign('IconoPestana',$iconoPestaña->getValor());
$modoMantenimiento = $em->getRepository('Modelo\ConfiguracionGlobal')->find("modo_mantenimiento");
$vm->assign('Mantenimiento',$modoMantenimiento->getValor());
$AutorizacionSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_SMTPAuth");
$vm->assign('AuthSMTP',$AutorizacionSMTP->getValor());
$EncripcionSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_SMTPSecure");
$vm->assign('EncripcionSMTP',$EncripcionSMTP->getValor());
$usuarioSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Username");
$vm->assign('UsuarioSMTP',$usuarioSMTP->getValor());
$passwordSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Password");
$vm->assign('PasswordSMTP',$passwordSMTP->getValor());
$hostSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Host");
$vm->assign('HostSMTP',$hostSMTP->getValor());
$puertoSMTP = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_Port");
$vm->assign('PuertoSMTP',$puertoSMTP->getValor());
$emailDefault = $em->getRepository('Modelo\ConfiguracionGlobal')->find("mail_mail");
$vm->assign('DefaultEmailSMTP',$emailDefault->getValor());
$ordenamientoMensajes = $em->getRepository('Modelo\ConfiguracionGlobal')->find("ordenamiento_mensajes");
$vm->assign('OrdenamientoMSJ',$ordenamientoMensajes->getValor());

$extensionesArchivos= $em->getRepository('Modelo\ConfiguracionGlobal')->find("extensiones_permitidas_archivos");

$extensiones=explode('[',$extensionesArchivos->getValor());
$extensiones=explode(']',$extensiones[1]);
$extensiones=split(',',$extensiones[0]);
// mando el array con todas las extensiones clave valor para el select
foreach ($extensiones as $ext) {
    $extensionesFinal[]=$ext;
}
$vm->assign('ExtensionesArchivos',json_encode($extensionesFinal));

$vm->display('configuracionGeneral.tpl');