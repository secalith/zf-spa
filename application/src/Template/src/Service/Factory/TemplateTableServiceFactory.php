<?php
namespace Template\Service\Factory;

use Template\Model\AreaTable as Table;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class TemplateTableServiceFactory implements FactoryInterface
{
    protected $identifier = "template";

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get("config");

        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        if (null!==$moduleConfig && array_key_exists($this->identifier, $moduleConfig)) {
            $routeTableGateway = $serviceLocator->get($moduleConfig[$this->identifier]['service_gateway']);
            $table = new Table($routeTableGateway);

            return $table;
        }

        return null;
    }
}
