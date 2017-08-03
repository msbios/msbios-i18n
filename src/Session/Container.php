<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Session;

use Zend\Session\Container as DefaultContainer;
use Zend\Session\ManagerInterface;

/**
 * Class Container
 * @package MSBios\I18n\Session
 */
class Container extends DefaultContainer
{
    /**
     * Container constructor.
     * @param null|string $name
     * @param ManagerInterface|null $manager
     */
    public function __construct($name = self::class, ManagerInterface $manager = null)
    {
        parent::__construct($name, $manager);
    }

    /**
     * @return null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param null $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}
