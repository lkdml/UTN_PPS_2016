<?php

require_once($_SERVER["DOCUMENT_ROOT"].'/configuracion.php');  

require_once (\CORE\Controlador\Config::getPublic('Ruta_Core_Controlador')."ViewManager.php");

use \CORE\Controlador\Aplicacion;
$app = Aplicacion::getInstancia();
$app->startSession(false);
$em = \CORE\Controlador\Entity_Manager::getInstancia()->getEntityManager();
$vm = new ViewManager(\CORE\Controlador\Config::getPublic('Front_SMARTY_TemplateDir'),null);
$vm->configPath(\CORE\Controlador\Config::getPublic('Ruta_Front').'css/',
                \CORE\Controlador\Config::getPublic('Ruta_Front').'js/',
                \CORE\Controlador\Config::getPublic('Ruta_Front').'imagenes/');
$vm->assign("RutaAvatars", \CORE\Controlador\Config::getPublic('Ruta_Avatars'));
$vm->assign('UsuarioLogueado',$app->getUsuario());
$UsuarioLogeado=$em->getRepository('Modelo\Usuario')->findby(array('usuarioId' => $app->getUsuario()->getUsuarioId()));

$Empresa=$em->getRepository('Modelo\Empresa')->findby(array('empresaId' => $UsuarioLogeado[0]->getEmpresa()->getEmpresaId()));

$Anuncios = $Empresa[0]->getAnuncio();

//SACO LOS ANUNCIOS QUE TIENEN FECHA DE FIN VENCIDA
foreach ($Anuncios as $key=>$anuncio){
        if ($anuncio->getFechaFinPublicacion() != null)
        {
            if (strtotime($anuncio->getFechaFinPublicacion()->format('d-m-Y')) < strtotime(date_format(new \DateTime("now"),'d-m-Y')))
            {
                
               unset($Anuncios[$key]); 
            }
        }
      }

//////////////////////////////////////////////////////////////////////////////
// ORDENO LOS ANUNCIOS
$iterator = $Anuncios->getIterator();

// define ordering closure, using preferred comparison method/field
$iterator->uasort(function ($first, $second) {
    return $first->getFechaCreacion() > $second->getFechaCreacion() ? -1 : 1;
});
//////////////////////////////////////////////////////////////////////////////

$minFecha=new DateTime('4000-01-01');
$vm->assign('minFecha',$minFecha); 


$vm->assign('Anuncios',$iterator); 

$vm->display('home.tpl');

?>
