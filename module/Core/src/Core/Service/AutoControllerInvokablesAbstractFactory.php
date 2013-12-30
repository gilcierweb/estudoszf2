<?php

/*
 * Automatic Controller Invokables via Abstract Factories.
 * @Link http://samsonasik.wordpress.com/2012/12/23/zend-framework-2-automatic-controller-invokables-via-abstract-factories/
 */

namespace Core\Service;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AutoControllerInvokablesAbstractFactory implements AbstractFactoryInterface
{

    public function canCreateServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        if (class_exists($requestedName . 'Controller')) {
            return true;
        }

        return false;
    }

    public function createServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $class = $requestedName . 'Controller';
        return new $class;
    }

}
