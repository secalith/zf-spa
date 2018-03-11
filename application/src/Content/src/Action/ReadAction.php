<?php

namespace Content\Action;

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

use Zend\Stdlib\Message;


class ReadAction implements ServerMiddlewareInterface, FormAwareInterface, PageViewAwareInterface
{
    use FormAwareTrait;
    use PageViewAwareTrait;

    private $router;

    private $template;

    private $page_view;

    private $requested_data;

    private $requested_format;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null)
    {
        $this->router   = $router;
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getRequestedData()
    {
        return $this->requested_data;
    }

    /**
     * @param mixed $requested_data
     * @return ReadAction
     */
    public function setRequestedData($requested_data)
    {
        $this->requested_data = $requested_data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestedFormat()
    {
        return $this->requested_format;
    }

    /**
     * @param mixed $requested_format
     * @return ReadAction
     */
    public function setRequestedFormat($requested_format)
    {
        $this->requested_format = $requested_format;
        return $this;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $message = new Message();

        $message->setContent($this->getRequestedData());

        $requestedFormat = $this->getRequestedFormat();

        switch($requestedFormat) {
            case 'json':
                return new JsonResponse($message->getContent());
            break;
            case 'form':
                $updateForm = new \Content\Form\UpdateForm();
                $updateForm->bind(new \Content\Model\ContentModel());
                $updateForm->setData($this->getRequestedData());
                break;
        }
        
        $this->template->addDefaultParam(Template\TemplateRendererInterface::TEMPLATE_ALL,'pageView',$data['pageView']);
//
        return new HtmlResponse($this->template->render($templateName, $data['pageView']));
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
