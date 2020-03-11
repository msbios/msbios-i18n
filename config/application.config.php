<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'Laminas\Serializer',
        'Laminas\Mvc\Plugin\FilePrg',
        'Laminas\Form',
        'Laminas\Hydrator',
        'Laminas\InputFilter',
        'Laminas\Filter',
        'Laminas\Mvc\Plugin\FlashMessenger',
        'Laminas\Mvc\Plugin\Identity',
        'Laminas\Mvc\Plugin\Prg',
        'Laminas\I18n',
        'Laminas\Router',
        'Laminas\Validator',
        'Laminas\Cache',
        'Zend\Validator',
        'Zend\Session',
        'Zend\Serializer',
        'Zend\Cache',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Form',
        'Zend\Hydrator',
        'Zend\InputFilter',
        'Zend\Filter',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Router',
        'Zend\I18n',

        'MSBios',
        'MSBios\Session',
        'MSBios\I18n',

        'ZendDeveloperTools',
        'SanSessionToolbar'
        'Laminas\DeveloperTools',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        // 'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        // 'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
    ],
];
