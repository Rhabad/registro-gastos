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
            'producto' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/producto',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action' => 'index',
                    ],
                ],
            ],

            /**
             * productos
             */

            // agregar producto pagina
            'productoAgregar' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/producto-agregar',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action' => 'productoAgregar',
                    ],
                ],
            ],


            // enviar datos producto agregado
            'productoEnviar' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/producto-enviar',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action' => 'productoEnviar',
                    ],
                ],
            ],

            'productoListar' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/producto-listar',
                    'defaults' => [
                        'controller' => Controller\ProductoController::class,
                        'action' => 'productoListar',
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
            'application/index/index' => __DIR__ . '/../view/application/producto/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
