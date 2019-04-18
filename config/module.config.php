<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

use MSBios\Factory\ModuleFactory;
use MSBios\I18n\Factory\TranslatorableFactory;
use Zend\Router\Http\Regex;

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
                TranslatorableFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            // services
            Module::class =>
                ModuleFactory::class,
            // \Zend\I18n\Translator\TranslatorInterface::class =>
            //     \Zend\I18n\Translator\TranslatorServiceFactory::class,
            Session\Container::class =>
                Factory\ContainerFactory::class,

            // listeners
            ListenerAggregate::class =>
                Factory\ListenerAggregateFactory::class
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

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],

    'view_helpers' => [
        'factories' => [
            View\Helper\LocaleHelper::class =>
                TranslatorableFactory::class
        ],
        'aliases' => [
            'locale' =>
                View\Helper\LocaleHelper::class
        ]
    ],

    'listeners' => [
        ListenerAggregate::class
    ]
];
