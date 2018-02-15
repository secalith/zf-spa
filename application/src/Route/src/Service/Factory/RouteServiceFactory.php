<?php

namespace Route\Service\Factory;

use Common\Service\Factory\CommonServiceFactory;
use Route\Service\RouteService as RequestedService;

class RouteServiceFactory extends CommonServiceFactory
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $this->setRequestedService(new RequestedService());
        return parent::__invoke( $container, $requestedName, $options = null);
    }


}
