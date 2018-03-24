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

        /* @var \Zend\Authentication\AuthenticationService $authService */
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);

//        if($authService->hasIdentity()) {
//            var_dump($authService->getIdentity());
//        }

        $authManager = $container->get(\Auth\Service\AuthManager::class);

        $requestedService = new LoginProcessAction($router, $template, $authManager,$authService);

        return $requestedService;
    }
}
