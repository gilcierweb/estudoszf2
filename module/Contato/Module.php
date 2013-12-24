<?php

/**
 * namespace para nosso modulo contato
 */

namespace Contato;

use Contato\View\Helper\AbsoluteUrl;
// import Contato\Model
use Contato\Model\Contato,
    Contato\Model\ContatoTable;
// import Zend\Db
use Zend\Db\ResultSet\ResultSet,
    Zend\Db\TableGateway\TableGateway;

class Module
{

    /**
     * include de arquivo para outras configuracoes desse modulo
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * autoloader para nosso modulo
     */
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

    /**
     * Register View Helper
     */
    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'menuAtivo' => 'Contato\View\Helper\MenuAtivo',
                'message' => 'Contato\View\Helper\Message',
                'absoluteUrl' => 'Contato\View\Helper\AbsoluteUrl',
            ),
            # registrar View Helper com injecao de dependencia
            'factories' => array(
                'menuAtivo' => function($sm) {
            return new View\Helper\MenuAtivo($sm->getServiceLocator()->get('Request'));
        },
                'message' => function($sm) {
            return new View\Helper\Message($sm->getServiceLocator()->get('ControllerPluginManager')->get('flashmessenger'));
        },
                // the array key here is the name you will call the view helper by in your view scripts
                'absoluteUrl' => function($sm) {
            $locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
            return new AbsoluteUrl($locator->get('Request'));
        },
            )
        );
    }

}
