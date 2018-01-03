<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Listener;

use MSBios\I18n\Session\Container;
use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DispatchListener
 * @package MSBios\I18n\Listener
 */
class DispatchListener
{
    /**
     * @param EventInterface $event
     */
    public function onDispatch(EventInterface $event)
    {
        /** @var ServiceLocatorInterface $serviceLocator */
        $serviceLocator = $event->getApplication()
             ->getServiceManager();

         /** @var TranslatorInterface $translator */
         $translator = $serviceLocator->get(TranslatorInterface::class);

        if ($locale = (new Container)->getLocale()) {
            $translator->setLocale($locale);
        }
    }
}
