<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use MSBios\I18n\Session\Container;
use MSBios\Session\SessionManagerInterface;

/**
 * Class ContainerFactory
 * @package MSBios\I18n\Factory
 */
class ContainerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Container|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var SessionManagerInterface $manager */
        $manager = $container->get(SessionManagerInterface::class);
        return new Container($requestedName, $manager);
    }
}
