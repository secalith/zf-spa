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
    public $routeName;

    public function exchangeArray($data)
    {
        $this->uid = (!empty($data['uid'])) ? $data['uid'] : null;
        $this->routeName = (!empty($data['route_name'])) ? $data['route_name'] : null;

    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
