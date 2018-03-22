<?php

namespace Auth\Action;

use \Auth\Service\AuthAdapter;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Db\Adapter\AdapterInterface;

class LoginProcessFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);

        $authAdapter = '';

        $authManager = $container->get(\Auth\Service\AuthManager::class);

        $requestedService = new LoginProcessAction($router, $template, $authManager);



        return $requestedService;
    }
}
