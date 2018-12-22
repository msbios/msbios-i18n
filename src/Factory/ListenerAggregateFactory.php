<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Factory;

use Interop\Container\ContainerInterface;
use MSBios\I18n\ListenerAggregate;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

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
            $container->get(TranslatorInterface::class)
        );
    }
}
