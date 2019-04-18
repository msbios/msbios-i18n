<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\Translator;

use Interop\Container\ContainerInterface;
use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class TranslatorInitializer
 * @package MSBios\I18n\Translator
 */
class TranslatorInitializer implements InitializerInterface
{
    /**
     * @inheritdoc
     *
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
     * @inheritdoc
     *
     * @param $an_array
     * @return TranslatorInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
