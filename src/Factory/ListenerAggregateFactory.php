<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Factory;

use Interop\Container\ContainerInterface;
use Laminas\I18n\Translator\TranslatorInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use MSBios\I18n\ListenerAggregate;
use MSBios\I18n\Session\Container;

/**
 * Class ListenerAggregateFactory
 * @package MSBios\I18n\Factory
 */
class ListenerAggregateFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ListenerAggregate|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ListenerAggregate(
            $container->get(TranslatorInterface::class),
            $container->get(Container::class)
        );
    }
}
