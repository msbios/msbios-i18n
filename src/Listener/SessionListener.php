<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Listener;

use MSBios\I18n\Module;
use MSBios\I18n\Session\Container;
use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class I18nListener
 * @package MSBios\I18n\Listener
 */
class SessionListener
{
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

//         $translator->setLocale((new Container)->getLocale())
//            ->setFallbackLocale($serviceLocator->get(Module::class)['default_locale']);
//
//         $event->getRouter()
//            ->setDefaultParam('locale', $translator->getLocale());
    }
}
