<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Factory;

use Interop\Container\ContainerInterface;
use Laminas\I18n\Translator\TranslatorInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

//use Zend\I18n\Translator\TranslatorInterface;
//use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class TranslatorableFactory
 * @package MSBios\I18n\Factory
 */
class TranslatorableFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return mixed|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new $requestedName(
            $container->get(TranslatorInterface::class)
        );
    }
}
