<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route;

interface RouteAwareInterface
{

    public function setRouteName($routeName);
    public function getRouteName();
    public function setRoute($route);
    public function getRoute();
}
