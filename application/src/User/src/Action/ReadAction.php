<?php

namespace User\Action;

use TableData\TableDataAwareInterface;
use TableData\TableDataAwareTrait;
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

class ReadAction implements ServerMiddlewareInterface, PageViewAwareInterface, TableDataAwareInterface
{
    use TableDataAwareTrait;
    use PageViewAwareTrait;

    private $router;

    private $template;

    private $page_view;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null)
    {
        $this->router   = $router;
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        if (! $this->template) {
            return new JsonResponse([
                'welcome' => 'Congratulations! You have installed the zend-expressive skeleton application.',
                'docsUrl' => 'https://docs.zendframework.com/zend-expressive/',
            ]);
        }

        $data = [];

        $data['pageView'] = $this->getPageView();

        $data['pageData'] = $this->getTableData('users');
//        var_dump($data['pageView']);

//        $templateName = sprintf(
//            "%s::%s",
//            $data['pageView']->getVariable('template')->getLocation(),
//            $data['pageView']->getVariable('template')->getName()
//        );

        $this->template->addDefaultParam(Template\TemplateRendererInterface::TEMPLATE_ALL,'pageView',$data['pageView']);
        $this->template->addDefaultParam(Template\TemplateRendererInterface::TEMPLATE_ALL,'pageData',$data['pageData']);
//
        return new HtmlResponse($this->template->render('user::read', $data['pageView']));
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
