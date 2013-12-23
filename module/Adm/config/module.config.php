<?php

return array(
    # definir e gerenciar controllers
    'controllers' => array(
        'invokables' => array(
            'HomeController' => 'Adm\Controller\HomeController',           
        ),
    ),
    # definir e gerenciar rotas
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'HomeController',
                        'action' => 'index',
                    ),
                    'constraints' => array(
//                        'lang' => '[a-z]{2}',
                        'module' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',   
                    ),
                ),
            ),
             // Literal route named "banner"
            'banner' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => 'banner',
                    'defaults' => array(
                        'controller' => 'BannersController',
                        'action' => 'index'
                    )
                )
            )
        ),
    ),
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
//    ),
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
