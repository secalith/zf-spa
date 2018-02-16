<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Service\Factory;

use Block\Model\BlockTable as Table;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class BlockTableServiceFactory implements FactoryInterface
{
    protected $identifier = "block";

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        if (null!==$moduleConfig && array_key_exists($this->identifier, $moduleConfig)) {
            $routeTableGateway = $serviceLocator->get($moduleConfig[$this->identifier]['service_gateway']);
            $table = new Table($routeTableGateway);

            return $table;
        }

        return null;
    }
}
