<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Listener;

use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Router\Http\RouteMatch;

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
        /** @var TranslatorInterface $translator */
        $translator = $event->getTarget()
            ->getServiceManager()
            ->get(TranslatorInterface::class);

        /** @var RouteMatch $routeMatch */
        $routeMatch = $event->getRouteMatch();

        /** @var string $locale */
        $locale = $routeMatch->getParam(
            'locale',
            $translator->getLocale()
        );

        $translator->setLocale($locale)
            ->setFallbackLocale($locale);

        $event->getRouter()
            ->setDefaultParam('locale', $locale);

        $routeMatch->setParam('locale', $locale);
    }
}
