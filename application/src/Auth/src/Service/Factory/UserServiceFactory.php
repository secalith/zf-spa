<?php

namespace Auth\Service\Factory;

use Common\Service\Factory\CommonServiceFactory;
use Auth\Service\UserService as RequestedService;

class UserServiceFactory extends CommonServiceFactory
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->setRequestedService(new RequestedService());
        return parent::__invoke( $container, $requestedName, $options = null);
    }
    
}
