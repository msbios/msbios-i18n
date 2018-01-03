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
 */
interface TranslatorAwareInterface
{
    /**
     * @return TranslatorInterface
     */
    public function getTranslator();

    /**
     * @param $translator
     * @return $this
     */
    public function setTranslator($translator);
}
