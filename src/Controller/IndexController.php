<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Controller;

use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorAwareTrait;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\I18n\Controller
 */
class IndexController extends AbstractActionController implements TranslatorAwareInterface
{
    use TranslatorAwareTrait;

    /**
     * IndexController constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->setTranslator($translator);
    }

    /**
     * @return ViewModel
     */
    public function indexAction(): ViewModel
    {
        return parent::indexAction()
            ->setVariable('locale', $this->params()->fromRoute('locale'));
    }

    /**
     * @return JsonModel
     */
    public function i18nAction(): JsonModel
    {
        /** @var TranslatorInterface $translator */
        $translator = $this->getTranslator();

        return new JsonModel([
            'locale' => $translator->getLocale(),
            'fallback_locale' => $translator->getFallbackLocale(),
            'messages' => $translator->getAllMessages()
        ]);
    }
}
