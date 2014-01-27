<?php

namespace Adm;

// Add these import statements:
use Adm\Model\Entity\Categorias;
use Adm\Model\Entity\CategoriasTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Adm\Entity\Subcategorias;

class Module
{

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

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Adm\Model\Entity\CategoriasTable' => function($sm) {
            $tableGateway = $sm->get('CategoriasTableGateway');
            $table = new CategoriasTable($tableGateway);
            return $table;
        },
                'CategoriasTableGateway' => function ($sm) {
            $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Categorias());
            return new TableGateway('categorias', $dbAdapter, null, $resultSetPrototype);
        },
                'Adm\Service\Subcategorias' => function($em) {
            return new Subcategorias($em->get('Doctrine\ORM\EntityManager'));
        }
            ),
        );
    }

}
