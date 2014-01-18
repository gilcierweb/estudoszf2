<?php

return array(
    # definir e gerenciar controllers
    'controllers' => array(
        'invokables' => array(
            'BannersController' => 'Adm\Controller\BannersController',
            'CategoriasController' => 'Adm\Controller\CategoriasController',
            'GaleriasController' => 'Adm\Controller\GaleriasController',
            'HomeController' => 'Adm\Controller\HomeController',
            'ProdutosController' => 'Adm\Controller\ProdutosController',
            'SubcategoriasController' => 'Adm\Controller\SubcategoriasController',
        ),
    ),
    # definir e gerenciar rotas
    'router' => array(
        'routes' => array(
            /* Essa é padrão pra todos controllers do module Adm
             * Exemplo: url = /adm, /adm/banners/edit, /adm/banners/add, /adm/produtos, /adm/produtos/add
             */
            'adm' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/adm',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Adm\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
//            'adm' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/adm',
//                    'defaults' => array(
//                        'controller' => 'HomeController',
//                        'action' => 'index',
//                    ),
//                    'constraints' => array(
////                        'lang' => '[a-z]{2}',
//                        'module' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                ),
//            ),
//            # segment para controller banners
//            'banners' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/banners[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'BannersController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//            # segment para controller categorias
//            'categorias' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/categorias[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'CategoriasController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//            # segment para controller galerias
//            'galerias' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/galerias[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'GaleriasController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//            # segment para controller home
//            'home' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/home[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'HomeController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//            # segment para controller produtos
//            'produtos' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/produtos[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'ProdutosController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//            # segment para controller subcategorias
//            'subcategorias' => array(
//                'type' => 'Segment',
//                'options' => array(
//                    'route' => '/adm/subcategorias[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'SubcategoriasController',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//    'router' => array(
//        'routes' => array(
//            'home' => array(
//                'type' => 'segment',
//                'options' => array(
//                    'route' => '/home[/:action][/:id]',
//                    'constraints' => array(
//                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                        'id' => '[0-9]+',
//                    ),
//                    'defaults' => array(
//                        'controller' => 'Adm\Controller\Home',
//                        'action' => 'index',
//                    ),
//                ),
//            ),
//        ),
        ),
    ),
    # definir e gerenciar servicos
    'service_manager' => array(
        'factories' => array(
        #'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    # definir e gerenciar layouts, erros, exceptions, doctype base
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'adm/home/index' => __DIR__ . '/../view/adm/home/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
