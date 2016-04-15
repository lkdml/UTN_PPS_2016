<?php
// bootstrap.php
require_once("configuracion.php");
require_once(__DIR__.'/core/controlador/AutoLoaderClass.php');
require_once(__DIR__."/core/libs/vendor/autoload.php");
use \CORE\Controlador\Config as Config;
use \CORE\Controlador\Aplicacion as Aplicacion ;
use \CORE\Controlador\Entity_Manager as Entity_Manager ;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


$paths = array(Config::getPublic('Ruta_Modelo'));
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => Config::getPublic('MySQL_User'),
    'password' => Config::getPublic('MySQL_Pass'),
    'dbname'   => Config::getPublic('MySQL_DB'),
);


$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$EntityManager = EntityManager::create($dbParams, $config);
$em = Entity_Manager::getInstancia();
$em->setEntityManager($EntityManager);


