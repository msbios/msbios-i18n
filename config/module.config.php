<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [
        'factories' => [
            Module::class =>
                Factory\ModuleFactory::class,

            // listeners
            Listener\RouteListener::class =>
                InvokableFactory::class,
            Listener\SessionListener::class =>
                InvokableFactory::class,

            \Zend\I18n\Translator\TranslatorInterface::class =>
                \Zend\I18n\Translator\TranslatorServiceFactory::class
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
                'listener' => Listener\SessionListener::class,
                'method' => 'onDispatch',
                'event' => \Zend\Mvc\MvcEvent::EVENT_DISPATCH,
                'priority' => 1,
            ],
            [
                'listener' => Listener\RouteListener::class,
                'method' => 'onRoute',
                'event' => \Zend\Mvc\MvcEvent::EVENT_ROUTE,
                'priority' => 1,
            ]
        ]
    ]
];
