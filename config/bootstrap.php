<?php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = require 'autoload/local.php';
$doctrineConfig = $config['doctrine'];
$paths = $doctrineConfig['paths'];
$isDevMode = $doctrineConfig['is_dev_mode'];
$dbParams = $doctrineConfig['connection'];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$entityManager = EntityManager::create($dbParams, $config);
