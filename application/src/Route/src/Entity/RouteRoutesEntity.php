<?php
namespace Route\Entity;

class RouteRoutesEntity
{
    /**
     * @var string
     */
    protected $uid;

    /**
     * @var string
     */
    protected $parent_uid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $route_uid;

    /**
     * @var string
     */
    protected $module;

    /**
     * @var string
     */
    protected $submodule;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $scenario;

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $options;
    /**
     * @var string
     */
    protected $constraints;

    /**
     * @param string $name
     * @return RouteRoutesEntity
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $name
     * @return RouteRoutesEntity
     */
    public function setParentUid($parent_uid)
    {
        $this->parent_uid = $parent_uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentUid()
    {
        return $this->parent_uid;
    }

    /**
     * @param string $name
     * @return RouteRoutesEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RouteRoutesEntity
     */
    public function setRouteUid($route_uid)
    {
        $this->route_uid = $route_uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getRouteUid()
    {
        return $this->route_uid;
    }

    /**
     * @param string $name
     * @return RouteRoutesEntity
     */
    public function setModule($module)
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $submodule
     * @return RouteRoutesEntity
     */
    public function setSubmodule($submodule)
    {
        $this->submodule = $submodule;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubmodule()
    {
        return $this->submodule;
    }

    /**
     * @param string $submodule
     * @return RouteRoutesEntity
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $submodule
     * @return RouteRoutesEntity
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $submodule
     * @return RouteRoutesEntity
     */
    public function setScenarioName($scenario)
    {
        $this->scenario = $scenario;
        return $this;
    }

    /**
     * @return string
     */
    public function getScenarioName()
    {
        return $this->scenario;
    }

    /**
     * @param string $route
     * @return RouteRoutesEntity
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $options
     * @return RouteRoutesEntity
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function setConstraints($constraints = null)
    {
        $this->constraints = $constraints;
        return $this;
    }
    /**
     * @return string
     */
    public function getConstraints()
    {
        return $this->constraints;
    }
}
