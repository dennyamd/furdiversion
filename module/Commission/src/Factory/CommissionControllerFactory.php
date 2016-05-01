<?php
namespace Commission\Factory;

use Zend\ServiceManager\FactoryInterface;
use Commission\Controller\CommissionController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Commission\Repository\CommissionRepository;

class CommissionControllerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $parentLocator = $controllerManager->getServiceLocator();

        // set up repository
        $repository = new CommissionRepository();
        $repository->setRepository($parentLocator->get('doctrine'));

        // set up controller
        $controller = new CommissionController();
        $controller->setRepository($repository);

        return $controller;
    }
}
