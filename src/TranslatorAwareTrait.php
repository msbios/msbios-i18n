<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

//use Zend\I18n\Translator\TranslatorInterface;
use Laminas\I18n\Translator\TranslatorInterface;

/**
 * Trait TranslatorAwareTrait
 * @package MSBios\I18n
 * @deprecated use \Zend\I18n\Translator\TranslatorAwareTrait
 */
trait TranslatorAwareTrait
{
    /** @var TranslatorInterface */
    protected $translator;

    /**
     * @return TranslatorInterface
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @param TranslatorInterface $translator
     * @return $this
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
        return $this;
    }
}
