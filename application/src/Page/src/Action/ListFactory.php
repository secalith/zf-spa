<?php

namespace Page\Action;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ListFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $requestedAction = new ListAction($router,$template);

        // get users and pass to the requested ctrl as list
        $dbResult = $container->get("Page\\Table")->listAll();

//        var_dump($dbResult);

        return $requestedAction;
    }
}
