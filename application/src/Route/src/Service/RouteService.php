<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RouteService
{
    protected $route_config;

    /**
     * Constructor
     */
    public function __construct($config = [])
    {
        //$this->name = $config['name'];
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this;
    }

    public function setRouteConfig($route_config = null)
    {
        $this->route_config = $route_config;
        return $this;
    }

    public function getRouteConfig()
    {
        return $this->route_config;
    }

}
