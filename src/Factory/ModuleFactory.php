<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]>
 */
namespace MSbios\I18n\Factory;

use Interop\Container\ContainerInterface;
use MSBios\I18n\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ModuleFactory
 * @package MSbios\I18n\Factory
 */
class ModuleFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return mixed
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $container->get('config')[Module::class];
    }
}
