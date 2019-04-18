<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n;

use Zend\I18n\Translator\TranslatorInterface;

/**
 * Interface TranslatorAwareInterface
 * @package MSBios\I18n
 * @deprecated use \Zend\I18n\Translator\TranslatorAwareInterface
 */
interface TranslatorAwareInterface
{
    /**
     * @return TranslatorInterface
     */
    public function getTranslator();

    /**
     * @param TranslatorInterface $translator
     * @return mixed
     */
    public function setTranslator(TranslatorInterface $translator);
}
