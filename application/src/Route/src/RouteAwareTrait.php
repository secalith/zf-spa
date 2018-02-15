<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route;

trait RouteAwareTrait
{

    protected $route;
    protected $route_name;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     * @return RouteAwareTrait
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function setRouteName($routeName)
    {
        $this->route_name = $routeName;
        return $this;
    }
    public function getRouteName()
    {
        return $this->route_name;
    }
}
