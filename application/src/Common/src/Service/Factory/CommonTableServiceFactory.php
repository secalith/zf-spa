<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Common\Service\Factory;

use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class CommonTableServiceFactory implements FactoryInterface
{

    protected $identifier;
    protected $requestedGateway;
    protected $requestedTable;

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
//        $moduleConfig = $serviceLocator->get($this->getRequestedGateway())->getRouteConfig();
        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        if (null!==$moduleConfig && array_key_exists($this->identifier, $moduleConfig)) {
            $routeTableGateway = $serviceLocator->get($moduleConfig[$this->getIdentifier()]['gateway']['service']['name']);
            $table = new $this->requestedTable($routeTableGateway);

            return $table;
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     * @return CommonTableServiceFactory
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestedGateway()
    {
        return $this->requestedGateway;
    }

    /**
     * @param mixed $requestedGateway
     * @return CommonTableServiceFactory
     */
    public function setRequestedGateway($requestedGateway)
    {
        $this->requestedGateway = $requestedGateway;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestedTable()
    {
        return $this->requestedTable;
    }

    /**
     * @param mixed $requestedTable
     * @return CommonTableServiceFactory
     */
    public function setRequestedTable($requestedTable)
    {
        $this->requestedTable = $requestedTable;
        return $this;
    }

}
