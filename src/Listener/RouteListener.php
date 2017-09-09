<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Listener;

use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\TranslatorInterface;

/**
 * Class RouteListener
 * @package MSBios\I18n\Listener
 */
class RouteListener
{
    /**
     * @param EventInterface $event
     * @todo https://docs.zendframework.com/zend-mvc-i18n/routing/
     */
    public function onRoute(EventInterface $event)
    {
        /** @var string $locale */
        $locale = $event->getRouteMatch()
            ->getParam('locale');

        $event->getTarget()
            ->getServiceManager()
            ->get(TranslatorInterface::class)
            ->setLocale($locale)
            ->setFallbackLocale($locale);

        $event->getRouter()
            ->setDefaultParam('locale', $locale);
    }
}
