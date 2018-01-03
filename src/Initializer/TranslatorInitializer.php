<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Initializer;

use Interop\Container\ContainerInterface;
use MSBios\I18n\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class TranslatorInitializer
 * @package MSBios\I18n\Initializer
 */
class TranslatorInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof TranslatorAwareInterface) {
            $instance->setTranslator(
                $container->get(TranslatorInterface::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return TranslatorInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
