<?php

namespace Auth\Action;

use Auth\Adapter\LocalAuthAdapter;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginActionFactory
{
    public function __invoke(ContainerInterface $container)
    {

        return new LoginAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(\Zend\Authentication\AuthenticationService::class),
            $container->get(LocalAuthAdapter::class)
        );
    }
}