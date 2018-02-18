<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class RouteTableServiceFactory extends CommonTableServicefactory
{
    protected $identifier = "route";
    protected $requestedGateway = "Route\\Gateway";
    protected $requestedTable = \Route\Model\RouteTable::class;

}
