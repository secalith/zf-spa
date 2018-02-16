<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Page\Service\Factory;

use Page\Model\PageTable as Table;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class PageTableServiceFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $identifier = "page";

    /**
     * @param \Interop\Container\ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return null|\SinglePageApplication\Route\Model\Table
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
