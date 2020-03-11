<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n;

use Interop\Container\ContainerInterface;
use Laminas\I18n\Translator\TranslatorInterface;

/**
 * Class TranslatorInitializer
 * @package MSBios\I18n
 * @deprecated use only Translator\TranslatorInitializer
 */
class TranslatorInitializer extends Translator\TranslatorInitializer
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        parent::__invoke($container, $instance);

        if ($instance instanceof \Laminas\I18n\Translator\TranslatorAwareInterface) {
            $instance->setTranslator(
                $container->get(TranslatorInterface::class)
            );
        }
    }
}
