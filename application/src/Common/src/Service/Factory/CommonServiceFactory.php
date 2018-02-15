<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Common\Service\Factory;

use Zend\ServiceManager\FactoryInterface as FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface as ServiceLocatorInterface;

class CommonServiceFactory implements FactoryInterface
{

    protected $requested_service;

    protected $identifier;

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $instance = new $this->requested_service();
        $config = $serviceLocator->get('config');

        $instance->setRouteConfig($config['application']['module'][$instance->getIdentifier()]);

//        $routeResult = $serviceLocator->get(RouteHelper::class);
        return $instance;
        if (null !== $routeResult->getMatchedRouteName()) {

//            $routeName = $routeResult->getMatchedRouteName();

            $modulesConfig = $config['application']['module']['route'];


var_dumP($modulesConfig);
            if (empty($routeConfig)) {
                return $instance;
            }

            if (null === $routeConfig
                || ! array_key_exists("module", $routeConfig)
                || ! array_key_exists("scenario", $routeConfig)
            ) {
                return $instance;
            }

            $routeModule = $routeConfig['module'];
            $routeSubmodule = strtolower($routeConfig['submodule']);
            $routeAction = $routeConfig['action'];
            $routeScenario = $routeConfig['scenario'];
            /* @var $moduleNs <module>_<scenario> */
            $moduleNs = strtolower(sprintf("%s_%s", $routeModule, $routeSubmodule));

            $scenarioNs = sprintf("%s.%s", $moduleNs, $routeScenario);

            // if configuration exists
            if (isset($config['application']['module'][$routeModule][$routeSubmodule])) {

                $appRouteConfig = $config['application']['module'][$routeModule][$routeSubmodule];

                $instance->setAppModuleRouteConfig($appRouteConfig);
                $instance->setModuleName($routeModule);
                $instance->setSubmoduleName($routeSubmodule);
                $instance->setScenarioName($routeScenario);
                $instance->setNamespace($moduleNs);
                $instance->setActionName($routeAction);

            }

            $instance->setRouteConfig($routeConfig);
        }
        return $instance;
    }

    public function setRequestedService($requestedService)
    {
        $this->requested_service = $requestedService;
        return $this;
    }

    public function getRequestedService()
    {
        return $this->requested_service;
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
     * @return CommonServiceFactory
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

}
