<?php

namespace Core;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Core\View\Helper\AbsoluteUrl;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getControllerConfig() {
        return array(
            'abstract_factories' => array(
                'Core\Service\AutoControllerInvokablesAbstractFactory' // invoca automaticamente todos os contollers
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                // the array key here is the name you will call the view helper by in your view scripts
                'absoluteUrl' => function($sm) {
            $locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
            return new AbsoluteUrl($locator->get('Request'));
        },
            ),
        );
    }

}
