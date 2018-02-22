<?php

namespace Auth\Adapter;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;

class LocalAuthAdapterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // Retrieve any dependencies from the container when creating the instance
        return new LocalAuthAdapter(/* any dependencies */);
    }
}