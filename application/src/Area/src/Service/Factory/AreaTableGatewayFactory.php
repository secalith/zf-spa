<?php
namespace Area\Service\Factory;

use Area\Model\AreaModel as Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class AreaTableGatewayFactory implements FactoryInterface
{
    protected $identifier = "area";

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('Application\Db\LocalAdapter');
        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();

        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Model());

        return new TableGateway($moduleConfig[$this->identifier]['database']['db']['table'], $dbAdapter, null, $resultSetPrototype);
    }
}
