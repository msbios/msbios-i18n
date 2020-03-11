<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Session;

use Laminas\Session\Container as DefaultContainer;
use Laminas\Session\ManagerInterface;

/**
 * Class Container
 * @package MSBios\I18n\Session
 */
class Container extends DefaultContainer
{
    /**
     * Container constructor.
     *
     * @param null|string $name
     * @param ManagerInterface|null $manager
     */
    public function __construct($name = self::class, ManagerInterface $manager = null)
    {
        parent::__construct($name, $manager);
    }

    /**
     * @param string|null $default
     * @return null|string
     */
    public function getLocale(string $default = null): ?string
    {
        return $this['locale'] ?? $default;
    }

    /**
     * @param $locale
     * @return Container
     */
    public function setLocale($locale): self
    {
        $this['locale'] = $locale;
        return $this;
    }
}
