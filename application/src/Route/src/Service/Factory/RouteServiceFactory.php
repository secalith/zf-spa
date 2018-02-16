<?php

namespace Route\Service\Factory;

use Common\Service\Factory\CommonServiceFactory;
use Route\Service\RouteService as RequestedService;

class RouteServiceFactory
{

    protected $identifier = 'route';

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $instance = new RequestedService();
        $config = $container->get('config');

        $instance->setRouteConfig($config['application']['module'][$this->identifier]);

        return $instance;
    }

}
