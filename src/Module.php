<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n;

use MSBios\ModuleInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\LazyListenerAggregate;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\ApplicationInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Module
 * @package MSBios\I18n
 */
class Module implements
    ModuleInterface,
    AutoloaderProviderInterface,
    BootstrapListenerInterface
{
    /** @const VERSION */
    const VERSION = '1.0.7';

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var EventManagerInterface $eventManager */
        $eventManager = $e->getApplication()
            ->getEventManager();

        /** @var ListenerAggregateInterface $moduleRouteListener */
        $moduleRouteListener = new ModuleRouteListener;
        $moduleRouteListener->attach($eventManager);

        /** @var ApplicationInterface $target */
        $target = $e->getTarget();

        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $target->getServiceManager();

        (new LazyListenerAggregate(
            $serviceManager->get(self::class)['listeners'],
            $serviceManager
        ))->attach($target->getEventManager());

        $this->bootstrapRouter($e);
    }

    /**
     * @param EventInterface $e
     */
    public function bootstrapRouter(EventInterface $e)
    {
        $e->getRouter()->setDefaultParam(
            'locale',
            $e->getTarget()
                ->getServiceManager()
                ->get(TranslatorInterface::class)
                ->getLocale()
        );
    }
}
