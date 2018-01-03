<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\I18n\Controller;

use MSBios\I18n\TranslatorAwareInterface;
use MSBios\I18n\TranslatorAwareTrait;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 * Class IndexController
 * @package MSBios\I18n\Controller
 */
class IndexController extends AbstractActionController implements TranslatorAwareInterface
{
    use TranslatorAwareTrait;

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return parent::indexAction()
            ->setVariable('locale', $this->params()->fromRoute('locale'));
    }

    /**
     * @return JsonModel
     */
    public function i18nAction()
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
