<?php
///**
// * @access protected
// * @author Judzhin Miles <info[woof-woof]msbios.com>
// */
//
//namespace MSBios\I18n\Controller;
//
//use MSBios\I18n\Session\Container;
//use Zend\Mvc\Controller\AbstractActionController;
//
///**
// * Class IndexController
// * @package MSBios\I18n\Controller
// */
//class IndexController extends AbstractActionController
//{
//
//    /**
//     * @return \Zend\Http\Response
//     */
//    public function indexAction()
//    {
//        /** @var Container $session */
//        $session = new Container;
//        $session->setLocale($this->params()->fromRoute('locale'));
//
//        if ($redirect = $this->params()->fromRoute('redirect')) {
//            // var_dump($redirect); die();
//        }
//
//        return $this->redirect()->toUrl('/');
//    }
//}
