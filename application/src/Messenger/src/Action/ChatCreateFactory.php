<?php

namespace Messenger\Action;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class ChatCreateFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = null;

        return new ChatCreateAction($router, $template);
    }
}
