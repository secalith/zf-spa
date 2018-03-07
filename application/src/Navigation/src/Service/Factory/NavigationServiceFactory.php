<?php

namespace Navigation\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class NavigationServiceFactory
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        if (null!==$moduleConfig && array_key_exists($this->identifier, $moduleConfig)) {
            $routeTableGateway = $serviceLocator->get($moduleConfig[$this->getIdentifier()]['gateway']['service']['name']);
            $table = new $this->requestedTable($routeTableGateway);

            return $table;
        }

        return null;
    }
}