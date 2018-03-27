<?php

namespace Messenger\Action;

use \Common\View\Model\ViewModel as CommonViewModel;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Db\Adapter\AdapterInterface;

class ChatStatusFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = null;

        return new ChatStatusAction($router, $template);
    }
}
