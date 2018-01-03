<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

use Zend\Router\Http\Regex;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'router' => [
        'routes' => [
            'i18n' => [
                'type' => Regex::class,
                'options' => [
                    'regex' => '/(?<locale>[a-z]{2,3}_[A-Z]{2}?).(?<format>(json|xml)?)',
                    'spec' => '/%locale%.%format%',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'i18n'
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class,
        ],
        'initializers' => [
            new Initializer\TranslatorInitializer
        ]
    ],

    'service_manager' => [
        'factories' => [
            // Services
            Module::class =>
                Factory\ModuleFactory::class,
            \Zend\I18n\Translator\TranslatorInterface::class =>
                \Zend\I18n\Translator\TranslatorServiceFactory::class,

            // listeners
            Listener\DispatchListener::class =>
                InvokableFactory::class,
            Listener\RouteListener::class =>
                InvokableFactory::class
        ],
        'aliases' => [
            'translator' => \Zend\I18n\Translator\TranslatorInterface::class
        ]
    ],

    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            ],
        ]
    ],

    Module::class => [
        'listeners' => [
            [
                'listener' => Listener\DispatchListener::class,
                'method' => 'onDispatch',
                'event' => \Zend\Mvc\MvcEvent::EVENT_DISPATCH,
                'priority' => 1,
            ], [
                'listener' => Listener\DispatchListener::class,
                'method' => 'onDispatch',
                'event' => \Zend\Mvc\MvcEvent::EVENT_DISPATCH_ERROR,
                'priority' => 1,
            ], [
                'listener' => Listener\RouteListener::class,
                'method' => 'onRoute',
                'event' => \Zend\Mvc\MvcEvent::EVENT_ROUTE,
                'priority' => 1,
            ]
        ]
    ]
];
