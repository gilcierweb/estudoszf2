<?php

namespace Core;

class Module
{

    public function getControllerConfig()
    {
        return array(
            'abstract_factories' => array(
                'Core\Service\AutoControllerInvokablesAbstractFactory' // invoca automaticamente todos os contollers
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
