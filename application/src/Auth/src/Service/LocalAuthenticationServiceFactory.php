<?php

namespace Auth\Service;

use Auth\Adapter\LocalAuthAdapter;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;

class LocalAuthenticationServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthenticationService(
            null,
            $container->get(LocalAuthAdapter::class)
        );
    }
}