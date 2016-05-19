<?php
require_once($FullPath.'./../site/core/controlador/AutoLoaderClass.php');
require_once(__DIR__.'./../site/bootstrap_orm.php');
require_once(__DIR__.'./../site/configuracion.php');
//include 'autoload.php';
use \CORE\Controlador\Config as Config;

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();
// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(__DIR__ . '/Entities'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$connectionParams = array(
    'driver'   => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'user'     => Config::getPublic('MySQL_User'),
    'password' => Config::getPublic('MySQL_Pass'),
    'dbname'   => Config::getPublic('MySQL_DB'),
    'charset' => 'utf8',
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);
// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
                $em->getConnection()->getSchemaManager()
);

$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em);

$classes = $driver->getAllClassNames();

$metadata = $cmf->getAllMetadata();

$generator = new Doctrine\ORM\Tools\EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, __DIR__ . '/Entities');
print 'Done!';