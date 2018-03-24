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
class ItemViewDelegatorFactory implements DelegatorFactoryInterface
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

            $currentRouteName = $container->get(\Common\Helper\RouteHelper::class)->getMatchedRouteName();
            $matchedParams = $container->get(\Common\Helper\RouteHelper::class)->getRouteResult()->getMatchedParams();

            $config = $container->get('config');

            if(array_key_exists('data_view',$config['application']['module'])) {
                if(array_key_exists($currentRouteName,$config['application']['module']['data_view'])) {
                    $routeConfig = $config['application']['module']['data_view'][$currentRouteName];
                    $requestedService = $container->get($routeConfig['service']);
                    $requestedMethod = $routeConfig['method'];
                    if(array_key_exists('params',$routeConfig)) {
                        foreach($routeConfig['params'] as $param){
                            $paramService = $param['service'];
                            $paramMethod = $param['method'];
                            $pResult = [];
                            if(array_key_exists('params',$param)){
                                foreach($param['params'] as $p){
                                    $pResult[$p['param_name_proxy']] = $container->get($param['service'])->{$param['method']}($p['param_name']);
                                }
                                var_dump($pResult);
                            } else {

                            }
                        }
                    } else {
                        $dbResult = $container->get($requestedService)->{$requestedMethod}();

                        $callback = call_user_func($callback)->addTableData($dbResult,$routeConfig['data_param']);
                    }
                    var_dump($routeConfig);
                }
            }

            var_dump($matchedParams);


//var_dump($dbResult);
        }

        if ($callback instanceof TableDataAwareInterface) {
            return $callback;
        }

        return call_user_func($callback);
    }

    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {}
}
