<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        // este es ruta /public/
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],

            // /public/nuevo/productos 0 cualquier otro en este ultimo
            // 'nuevo' => [
            //     'type' => Segment::class,
            //     'options' => [
            //         'route' => '/nuevo[/:action]',
            //         'defaults' => [
            //             'controller' => Controller\NuevoController::class,
            //             'action' => 'productos',
            //         ],
            //     ],
            // ],

            //tambien se puede hacer asi
            // /public/productos
            'nuevo' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/productos',
                    'defaults' => [
                        'controller' => Controller\NuevoController::class,
                        'action' => 'productos',
                    ],
                ],
            ],


            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],


            /**
             * productos
             */

            'producto' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/producto-agregar',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action' => 'productoAgregar',
                    ],
                ],
            ],
            /**
             * productos
             */
        ],
    ],
    'controllers' => [
        'factories' => [
                // si quieres un nuevo controlador, agregar uno nuevo aqui
            Controller\IndexController::class => InvokableFactory::class,
            Controller\NuevoController::class => InvokableFactory::class,
            Controller\ProductoController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
