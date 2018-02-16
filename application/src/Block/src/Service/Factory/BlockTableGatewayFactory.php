<?php
/**
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Block\Service\Factory;

use Block\Model\BlockModel as Model;
use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class BlockTableGatewayFactory implements FactoryInterface
{
    protected $identifier = "block";

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
