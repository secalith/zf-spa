<?php

namespace Auth\Action;

use TableData\TableDataAwareInterface;
use TableData\TableDataAwareTrait;
use Form\FormAwareInterface;
use Form\FormAwareTrait;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;
use View\Controller\PageViewAwareInterface;
use View\Controller\PageViewAwareTrait;

class LoginProcessAction implements ServerMiddlewareInterface, FormAwareInterface
{

    use FormAwareTrait;

    private $router;

    private $template;

    private $page_view;

    private $authManager;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null, $authManager=null)
    {
        $this->router   = $router;
        $this->template = $template;
        $this->authManager = $authManager;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

//        $redirectUrl = (string)$this->params()->fromQuery('redirectUrl', '');
//        if (strlen($redirectUrl)>2048) {
//            throw new \Exception("Too long redirectUrl argument passed");
//        }

        $formPostData = $request->getParsedBody();
        $form = $this->getForm('form_login');
        $form->setData($formPostData);
        $this->addForm($form, 'form_login');

        var_dump($this->getForm('form_login')->isValid());

        if (true===$this->getForm('form_login')->isValid()) {

            $data = $this->getForm('form_login')->getData();
            var_dump($data);
            var_dump($this->authManager);
// Perform login attempt.
            $result = $this->authManager->login($data['email'],
                $data['password'], $data['remember_me']);
var_dump($result);
            // Check result.
//            if ($result->getCode()==Result::SUCCESS) {
//
//            }

        }

            if (! $this->template) {
            return new JsonResponse([
                'welcome' => 'Congratulations! You have installed the zend-expressive skeleton application.',
                'docsUrl' => 'https://docs.zendframework.com/zend-expressive/',
            ]);
        }

        $data = [];

//        $data['pageView'] = $this->getPageView();

//        $data['pageData'] = $this->getTableData('users');
//        var_dump($data['pageView']);

//        $templateName = sprintf(
//            "%s::%s",
//            $data['pageView']->getVariable('template')->getLocation(),
//            $data['pageView']->getVariable('template')->getName()
//        );

//        $this->template->addDefaultParam(Template\TemplateRendererInterface::TEMPLATE_ALL,'pageView',$data['pageView']);
//        $this->template->addDefaultParam(Template\TemplateRendererInterface::TEMPLATE_ALL,'pageData',$data['pageData']);
//
        return new HtmlResponse($this->template->render('auth::login', $data));
    }

    /**
     * @return mixed
     */
    public function getPageView()
    {
        return $this->page_view;
    }

    /**
     * @param mixed $page_view
     * @return HomePageAction
     */
    public function setPageView($page_view)
    {
        $this->page_view = $page_view;
        return $this;
    }

}
