<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n;

return [

    //'router' => [
    //    'routes' => [
    //        'locale' => [
    //            'type' => \Zend\Router\Http\Segment::class,
    //            'options' => [
    //                'route' => '/:locale[/:redirect]',
    //                'defaults' => [
    //                    'controller' => Controller\IndexController::class,
    //                    'action' => 'index',
    //                ],
    //                'constraints' => [
    //                    'locale' => '(?i)[a-z]{2,3}(?:_[a-z]{2})?',
    //                ],
    //            ],
    //            'may_terminate' => true
    //        ],
    //    ],
    //],

    //'controllers' => [
    //    'factories' => [
    //        Controller\IndexController::class =>
    //            \Zend\ServiceManager\Factory\InvokableFactory::class,
    //    ],
    //],

    'service_manager' => [
        'invokables' => [
            Listener\I18nListener::class => Listener\I18nListener::class
        ],
        'factories' => [
            Module::class => Factory\ModuleFactory::class,
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
        ],
    ],

    Module::class => [
        // Default locale
        'default_locale' => 'en_US',

        // Default listener priority
        'default_listener_priority' => 100500
    ]
];
