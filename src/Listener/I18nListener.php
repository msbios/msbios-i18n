<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Listener;

use MSBios\I18n\Module;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class I18nListener
 * @package MSBios\I18n\Listener
 */
class I18nListener extends AbstractListenerAggregate
{
    /**
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, [$this, 'onDispatch'], $priority);
    }

    /**
     * @param EventInterface $event
     */
    public function onDispatch(EventInterface $event)
    {
        /** @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $event->getTarget()
            ->getServiceManager();

        /** @var TranslatorInterface $translator */
        $translator = $serviceLocator->get(TranslatorInterface::class);

        $translator->setLocale((new Container)->getLocale())
            ->setFallbackLocale($serviceLocator->get(Module::class)['default_locale']);

        $event->getRouter()
            ->setDefaultParam('locale', $translator->getLocale());
    }
}
