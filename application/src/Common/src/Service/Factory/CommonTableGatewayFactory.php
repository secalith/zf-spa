<?php
namespace Common\Service\Factory;

use Common\Hydrator\JsonHydrator;
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

        $moduleConfig = $serviceLocator->get("Route\\Service")->getRouteConfig();
//         check if database-adapter is defined, if not use default one
        if(array_key_exists('adapter',$moduleConfig[$this->identifier]['gateway'])
            && $serviceLocator->has($moduleConfig[$this->identifier]['gateway']['adapter'])) {
            $dbAdapter = $serviceLocator->get($moduleConfig[$this->identifier]['gateway']['adapter']);
        } else {
            $dbAdapter = $serviceLocator->get('Application\Db\LocalAdapter');
        }

        $tableName = $moduleConfig[$this->identifier]['database']['db']['table'];

        $hydratorMap = $moduleConfig[$this->identifier]['gateway']['hydrator']['map'];
        $hydrator = new $moduleConfig[$this->identifier]['gateway']['hydrator']['class']($hydratorMap);
        $hydrator->addStrategy('attributes', new JsonHydrator());
        $hydrator->addStrategy('parameters', new JsonHydrator());
        $hydrator->addStrategy('options', new JsonHydrator());

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
