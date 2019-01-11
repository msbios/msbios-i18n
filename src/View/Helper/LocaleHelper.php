<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\I18n\View\Helper;

use MSBios\I18n\TranslatorAwareTrait;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\View\Helper\AbstractHelper;

/**
 * Class LocaleHelper
 * @package MSBios\I18n\View\Helper
 */
class LocaleHelper extends AbstractHelper
{
    use TranslatorAwareTrait;

    /**
     * LocaleHelper constructor.
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->setTranslator($translator);
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this
            ->getTranslator()
            ->getLocale();
    }
}
