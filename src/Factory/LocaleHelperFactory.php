<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Factory;

use Interop\Container\ContainerInterface;
use MSBios\I18n\View\Helper\LocaleHelper;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class LocaleHelperFactory
 * @package MSBios\I18n\Factory
 */
class LocaleHelperFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return LocaleHelper|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LocaleHelper($container->get(TranslatorInterface::class));
    }
}
