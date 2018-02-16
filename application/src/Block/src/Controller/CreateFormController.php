<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Controller;

use Auth\Model\User;
use Zend\View\Model\ViewModel;

class CreateFormController extends CreateController
{

    public function indexAction()
    {

        $viewModel = new ViewModel(
            array(
                'module' => $this->getModuleName(),
                'submodule' => $this->getSubmoduleName(),
                'scenario' => $this->getScenarioName(),
                'form'=>$this->getForm(),
                'formView'=>$this->getFormView(),
            )
        );

        /* if already logged-in then redirect to success page */
        if (null!==$this->getAuthService()&&$this->getAuthService()->hasIdentity()) {
            $this->flashMessenger()->addMessage('You are already logged in.');
            //return $this->redirect()->toRoute('home');
        } else {
            // load form
            $request = $this->getRequest();

            $dataSelector = $this->getInternalService("dataSelector");
            $formTypeRequest = $dataSelector->getParam("type");

            switch ($formTypeRequest) {
                case 'base':
                    $viewModel->setTemplate('block/create/base.phtml');
                    break;
                case 'html':
                    $viewModel->setTemplate('block/create/html.phtml');
                    break;
                case 'image':
                    $viewModel->setTemplate('block/create/image.phtml');
                    break;
                case 'api':
                    $viewModel->setTemplate('block/create/api.phtml');
                    break;
                case 'menu':
                    $viewModel->setTemplate('block/create/menu.phtml');
                    break;
                case 'carousel':
                    $viewModel->setTemplate('block/create/carousel.phtml');
                    break;
                case 'form':
                    $viewModel->setTemplate('block/create/form.phtml');
                    break;
                default:
            }
        }

        $viewModel->setTerminal(true);

        return $viewModel;
    }

    public function processAction()
    {
        if ($this->getAuthService()->hasIdentity()) {
            $this->flashMessenger()->addInfoMessage('You are already logged in. To see this template logout first');
            return $this->redirect()->toRoute('home');
        }


        $form = $this->getForm("auth_login");
        $redirect = 'auth_login';

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $username = $this->getInternalService('arrayUtils')
                    ->extractData($form->getData(), "auth_login.login.username");
                $password = $this->getInternalService('arrayUtils')
                    ->extractData($form->getData(), "auth_login.login.password");

                $this->getAuthService()->getAdapter()
                    ->setIdentity($username)
                    ->setCredential($password);

                $result = $this->getAuthService()->authenticate();

                foreach ($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }
                $this->getSessionStorage()
                    ->setRememberMe(1);

                if ($result->isValid()) {
                    $redirect = 'success';
                    //check if it has rememberMe :
                    if ($request->getPost('keep_logged_in') == 1) {
                        $this->getSessionStorage()
                            ->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('username'));

                    return $this->redirect()->toRoute($redirect);
                }
            }
        }

        return $this->forward()->dispatch('Auth\Controller\AuthController', [
            'action'     => 'login',
            'scenario'   => 'login',
        ]);
    }
}
