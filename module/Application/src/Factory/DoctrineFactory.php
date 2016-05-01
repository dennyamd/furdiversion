<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $doctrineConfig = $config['doctrine'];
        $paths = $doctrineConfig['paths'];
        $isDevMode = $doctrineConfig['is_dev_mode'];
        $dbParams = $doctrineConfig['params'];

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $entityManager = EntityManager::create($dbParams, $config);

        return $entityManager;
    }
}
