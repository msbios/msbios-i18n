<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'router' => [
        'routes' => [
            'home' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/[:locale[/]]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ],
                    'constraints' => [
                        'locale' => '[a-z]{2,3}_[A-Z]{2}?',
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'application' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'application[/]'
                        ]
                    ]
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class,
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../../view/error/404.phtml',
            'error/index' => __DIR__ . '/../../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../../view',
        ],
    ],

    'translator' => [
         // 'locale' => 'ru_RU'
    ],
];
