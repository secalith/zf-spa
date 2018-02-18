<?php
namespace Common\Service\Factory;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class CommonTableGatewayFactory implements FactoryInterface
{
    protected $identifier;
    protected $model;

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('Application\Db\LocalAdapter');
        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        $tableName = $moduleConfig[$this->identifier]['database']['db']['table'];

        $hydratorMap = $moduleConfig[$this->identifier]['gateway']['hydrator']['map'];
        $hydrator = new $moduleConfig[$this->identifier]['gateway']['hydrator']['class']($hydratorMap);

        $resultSet = new \Zend\Db\ResultSet\HydratingResultSet(
            $hydrator, new $this->model()
        );

        return new TableGateway(
            $tableName, $dbAdapter, null, $resultSet
        );
    }

    /**
     * @param mixed $identifier
     * @return CommonTableGatewayFactory
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

}
