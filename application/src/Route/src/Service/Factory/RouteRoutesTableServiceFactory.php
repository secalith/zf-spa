<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Route\Service\Factory;

use Common\Service\Factory\CommonTableServiceFactory;

class RouteRoutesTableServiceFactory extends CommonTableServiceFactory
{
    protected $identifier = "route_routes";
    protected $requestedGateway = "RouteRoutes\\Gateway";
    protected $requestedTable = \Route\Model\RouteRoutesTable::class;
}
