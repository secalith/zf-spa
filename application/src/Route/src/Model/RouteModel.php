<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route\Model;

class RouteModel
{
    public $uid;
    public $route_name;

    public function exchangeArray($data)
    {
        $this->uid = (!empty($data['uid'])) ? $data['uid'] : null;
        $this->route_name = (!empty($data['route_name'])) ? $data['route_name'] : null;

    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     * @return RouteModel
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRouteName()
    {
        return $this->route_name;
    }

    /**
     * @param mixed $route_name
     * @return RouteModel
     */
    public function setRouteName($route_name)
    {
        $this->route_name = $route_name;
        return $this;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
