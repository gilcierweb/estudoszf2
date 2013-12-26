<?php

/**
 * namespace para nosso modulo contato
 */

namespace Contato;

//use Contato\View\Helper\AbsoluteUrl;
// import Model\Contato
use Contato\Model\Contato;
use Contato\Model\ContatoTable;
// import Zend\Db
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

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
//    public function getViewHelperConfig()
//    {
//        return array(
//            'invokables' => array(
//                'menuAtivo' => 'Contato\View\Helper\MenuAtivo',
//                'message' => 'Contato\View\Helper\Message',
//                'absoluteUrl' => 'Contato\View\Helper\AbsoluteUrl',
//            ),
//            # registrar View Helper com injecao de dependencia
//            'factories' => array(
//                'menuAtivo' => function($sm) {
//            return new View\Helper\MenuAtivo($sm->getServiceLocator()->get('Request'));
//        },
//                'message' => function($sm) {
//            return new View\Helper\Message($sm->getServiceLocator()->get('ControllerPluginManager')->get('flashmessenger'));
//        },
//                // the array key here is the name you will call the view helper by in your view scripts
//                'absoluteUrl' => function($sm) {
//            $locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
//            return new AbsoluteUrl($locator->get('Request'));
//        },
//            )
//        );
//    }

    /**
     * Register Services
     */
    public function getServiceConfig()
    {
//        return array(
//            'factories' => array(
//                'ContatoTableGateway' => function ($sm) {
//            // obter adapter db atraves do service manager
//            $adapter = $sm->get('AdapterDb');
//
//            // configurar ResultSet com nosso model Contato
//            $resultSetPrototype = new ResultSet();
//            $resultSetPrototype->setArrayObjectPrototype(new Contato());
//
//            // return TableGateway configurado para nosso model Contato
//            return new TableGateway('contatos', $adapter, null, $resultSetPrototype);
//        },
//                'ModelContato' => function ($sm) {
//            // return instacia Model ContatoTable
//            return new ContatoTable($sm->get('ContatoTableGateway'));
//        }
//            )
//        );
        return array(
            'factories' => array(
                'Contato\Model\ContatoTable' => function($sm) {
            $tableGateway = $sm->get('ContatoTableGateway');
            $table = new ContatoTable($tableGateway);
            return $table;
        },
                'ContatoTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Contato());
            return new TableGateway('Contatos', $dbAdapter, null, $resultSetPrototype);
        },
            ),
        );
    }

}
