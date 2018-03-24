<?php

namespace TableData\Action\Delegator;

use Common\View\Model\ViewModel;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;
use TableData\TableDataAwareInterface;

/**
 * Class PageViewDelegatorFactory
 *
 * @package View\Controller
 */
class CollectionViewDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $name
     * @param callable $callback
     * @param array|null $options
     * @return callable|mixed
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        // The callback must implement
        if ( ! call_user_func($callback) instanceof TableDataAwareInterface) {
            return call_user_func($callback);
        } else {
            // get dataSource configuration


            $dbResult = $container->get("User\\Table")->listAll();
//var_dump($dbResult);
            $callback = call_user_func($callback)->addTableData($dbResult,'users');
        }

        if ($callback instanceof TableDataAwareInterface) {
            return $callback;
        }

        return call_user_func($callback);
    }

    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {}
}
