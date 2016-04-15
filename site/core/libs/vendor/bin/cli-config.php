<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use \CORE\Controlador\Entity_Manager as Entity_Manager ;


// replace with file to your own project bootstrap
require_once '../../../../bootstrap_orm.php';

// replace with mechanism to retrieve EntityManager in your app
$Entity_Manager = Entity_Manager::getInstancia();
$entityManager = $Entity_Manager->getEntityManager();



return ConsoleRunner::createHelperSet($entityManager);