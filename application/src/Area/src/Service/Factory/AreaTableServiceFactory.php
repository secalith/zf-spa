<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Area\Service\Factory;

use Area\Model\AreaTable as Table;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class AreaTableServiceFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $identifier = "area";

    /**
     * @param \Interop\Container\ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return null|\Area\Model\AreaTable
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return null|\Route\Model\RouteTable
     */
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
