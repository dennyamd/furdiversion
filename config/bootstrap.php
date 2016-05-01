<?php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(
    "module/Commission/Entity"
);
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'furry',
    'password' => 'furry',
    'dbname' => 'commission'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$entityManager = EntityManager::create($dbParams, $config);
