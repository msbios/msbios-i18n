<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

use MSBios\I18n\Session\Container;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Router\RouteMatch;

/**
 * Class ListenerAggregate
 * @package MSBios\I18n
 */
class ListenerAggregate extends AbstractListenerAggregate implements TranslatorAwareInterface
{
    use TranslatorAwareTrait;

    /**
     * ListenerAggregate constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->setTranslator($translator);
    }

    /**
     * @inheritdoc
     *
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_ROUTE, [$this, 'onRoute'], $priority);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_BOOTSTRAP, [$this, 'onBootstrap'], $priority);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_DISPATCH, [$this, 'onDispatch'], $priority);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'onDispatch'], $priority);
    }

    /**
     * @param EventInterface $event
     * @todo https://docs.zendframework.com/zend-mvc-i18n/routing/
     */
    public function onRoute(EventInterface $event)
    {
        /** @var RouteMatch $routeMatch */
        $routeMatch = $event->getRouteMatch();

        /** @var string $locale */
        $locale = $routeMatch->getParam(
            'locale',
            $this->translator->getLocale()
        );

        $this->translator->setLocale($locale)
            ->setFallbackLocale($locale);

        $event->getRouter()
            ->setDefaultParam('locale', $locale);

        $routeMatch->setParam('locale', $locale);
    }

    /**
     * @inheritdoc
     *
     * @param EventInterface $event
     */
    public function onBootstrap(EventInterface $event)
    {
        /** @var EventManagerInterface $eventManager */
        $eventManager = $event->getApplication()
            ->getEventManager();

        /** @var ListenerAggregateInterface $moduleRouteListener */
        $moduleRouteListener = new ModuleRouteListener;
        $moduleRouteListener->attach($eventManager);

        $event->getRouter()->setDefaultParam(
            'locale',
            $this->translator->getLocale()
        );
    }

    /**
     * @param EventInterface $event
     */
    public function onDispatch(EventInterface $event)
    {
        if ($locale = (new Container)->getLocale()) {
            $this->translator->setLocale($locale);
        }
    }
}
